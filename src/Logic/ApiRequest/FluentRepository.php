<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Logic\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use EDT\ConditionFactory\ConditionFactoryInterface;
use EDT\DqlQuerying\ConditionFactories\DqlConditionFactory;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\MappingException;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\DqlQuerying\ObjectProviders\DoctrineOrmEntityProvider;
use EDT\DqlQuerying\SortMethodFactories\SortMethodFactory;
use EDT\DqlQuerying\Utilities\JoinFinder;
use EDT\DqlQuerying\Utilities\QueryBuilderPreparer;
use EDT\JsonApi\InputHandling\RepositoryInterface;
use EDT\Querying\Contracts\FunctionInterface;
use EDT\Querying\Contracts\PaginationException;
use EDT\Querying\FluentQueries\ConditionDefinition;
use EDT\Querying\FluentQueries\FluentQuery;
use EDT\Querying\FluentQueries\SliceDefinition;
use EDT\Querying\FluentQueries\SortDefinition;
use EDT\Querying\Pagination\OffsetPagination;
use EDT\Querying\Pagination\PagePagination;
use EDT\Querying\Utilities\Iterables;
use EDT\Querying\Utilities\Reindexer;
use InvalidArgumentException;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Service\Attribute\Required;
use const PHP_INT_MAX;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends ServiceEntityRepository<TEntity>
 * @template-implements RepositoryInterface<TEntity>
 */
abstract class FluentRepository extends ServiceEntityRepository implements RepositoryInterface
{
    protected DoctrineOrmEntityProvider $objectProvider;
    protected JoinFinder $joinFinder;
    protected QueryBuilderPreparer $builderPreparer;
    protected ?LoggerInterface $logger = null;

    public function __construct(
        protected readonly DqlConditionFactory $conditionFactory,
        ManagerRegistry $registry,
        protected readonly Reindexer $reindexer,
        protected readonly SortMethodFactory $sortMethodFactory,
        string $entityClass
    ) {
        parent::__construct($registry, $entityClass);

        $entityManager = $this->getEntityManager();
        $metadataFactory = $entityManager->getMetadataFactory();
        $this->joinFinder = new JoinFinder($metadataFactory);
        $this->builderPreparer = new QueryBuilderPreparer($entityClass, $metadataFactory, $this->joinFinder);
        $this->objectProvider = new DoctrineOrmEntityProvider($entityManager, $this->builderPreparer, $entityClass);
    }

    public function getEntitiesByIdentifiers(
        array $identifiers,
        array $conditions,
        array $sortMethods,
        array $identifierPropertyPath
    ): array {
        $identifierCondition = $this->conditionFactory->propertyHasAnyOfValues($identifiers, $identifierPropertyPath);
        $conditions[] = $identifierCondition;

        return $this->getEntities($conditions, $sortMethods);
    }

    public function createFluentQuery(): FluentQuery
    {
        return new DqlFluentQuery(
            $this->objectProvider,
            new DqlConditionDefinition($this->conditionFactory, true),
            new SortDefinition($this->sortMethodFactory),
            new SliceDefinition()
        );
    }

    /**
     * Will return all entities matching the given condition with the specified sorting.
     *
     * If you have a use-case that is covered by
     * {@link EntityRepository::findBy() findBy}/{@link EntityRepository::matching matching}
     * you should use these methods instead of this one, as they are the more standard approach.
     *
     * If you want to use paths instead of manually defining joins you should use this method.
     * You may also need to use it for more exotic expressions covered by conditions like
     * {@link ConditionFactoryInterface::propertyHasSize()} and {@link ConditionFactoryInterface::propertiesEqual()}.
     *
     * This method won't apply any restrictions beside the provided conditions.
     *
     * @param array<int,ClauseFunctionInterface<bool>> $conditions  will be applied in an `AND` conjunction
     * @param array<int,OrderBySortMethodInterface>    $sortMethods will be applied in the given order
     *
     * @return array<int,TEntity>
     */
    public function getEntities(array $conditions, array $sortMethods, int $offset = 0, int $limit = null): array
    {
        $pagination = 0 !== $offset || null !== $limit
            ? new OffsetPagination($offset, $limit ?? PHP_INT_MAX)
            : null;

        return $this->objectProvider->getEntities($conditions, $sortMethods, $pagination);
    }

    /**
     * Will provide access to all entities matching the given condition via a paginator.
     * The entities will be sorted by the specified sorting.
     *
     * This method won't apply any restrictions beside the provided conditions.
     *
     * @param array<int,ClauseFunctionInterface<bool>> $conditions  will be applied in an `AND` conjunction
     * @param array<int,OrderBySortMethodInterface>    $sortMethods will be applied in the given order
     *
     * @return Pagerfanta<TEntity>
     */
    public function getEntitiesForPage(
        array $conditions,
        array $sortMethods,
        PagePagination $pagination
    ): Pagerfanta {
        $queryBuilder = $this->objectProvider->generateQueryBuilder($conditions, $sortMethods);

        $queryAdapter = new QueryAdapter($queryBuilder);
        $paginator = new Pagerfanta($queryAdapter);
        $paginator->setMaxPerPage($pagination->getSize());
        $paginator->setCurrentPage($pagination->getNumber());

        return $paginator;
    }

    /**
     * @param list<FunctionInterface<bool>> $conditions
     *
     * @return int<0, max>
     */
    public function getEntityCount(array $conditions): int
    {
        $pagePagination = new PagePagination(1, 1);

        return $this->getEntitiesForPage($conditions, [], $pagePagination)->getAdapter()->getNbResults();
    }

    /**
     * @param non-empty-string                 $id
     * @param list<FunctionInterface<bool>>    $conditions
     * @param non-empty-list<non-empty-string> $identifierPropertyPath
     *
     * @return TEntity
     */
    public function getEntityByIdentifier(string $id, array $conditions, array $identifierPropertyPath): object
    {
        $identifierCondition = $this->conditionFactory->propertyHasValue($id, $identifierPropertyPath);
        $conditions[] = $identifierCondition;
        $entities = $this->getEntities($conditions, [], 0, 2);

        return match (count($entities)) {
            0       => throw new InvalidArgumentException("No matching `{$this->getEntityName()}` entity found."),
            1       => array_pop($entities),
            default => throw new InvalidArgumentException("Multiple matching `{$this->getEntityName()}` entities found.")
        };
    }

    /**
     * @param array<int,ClauseFunctionInterface<bool>> $conditions         will be applied in an `AND` conjunction
     * @param array<int,OrderBySortMethodInterface>    $sortMethods        will be applied in the given order
     * @param non-empty-string                         $identifierProperty
     *
     * @return list<non-empty-string>
     *
     * @throws MappingException
     * @throws PaginationException
     */
    public function getEntityIdentifiers(array $conditions, array $sortMethods, string $identifierProperty): array
    {
        $entityProvider = new DoctrineOrmPartialDTOProvider(
            $this->getEntityManager(),
            $this->builderPreparer,
            $this->getEntityName(),
            [$identifierProperty]
        );

        $entities = $entityProvider->getEntities($conditions, $sortMethods, null);
        $entities = Iterables::asArray($entities);
        $partialDtos = array_values($entities);

        return array_map(static fn (PartialDTO $dto): string => $dto->getProperty($identifierProperty), $partialDtos);
    }

    public function reindexEntities(array $entities, array $conditions, array $sortMethods): array
    {
        return $this->reindexer->reindexEntities($entities, $conditions, $sortMethods);
    }

    public function assertMatchingEntities(array $entities, array $conditions): void
    {
        foreach ($entities as $entity) {
            $this->reindexer->assertMatchingEntity($entity, $conditions);
        }
    }

    public function isMatchingEntity(object $entity, array $conditions): bool
    {
        return $this->reindexer->isMatchingEntity($entity, $conditions);
    }

    public function assertMatchingEntity(object $entity, array $conditions): void
    {
        $this->reindexer->assertMatchingEntity($entity, $conditions);
    }

    public function deleteEntityByIdentifier(string $entityIdentifier, array $conditions, array $identifierPropertyPath): void
    {
        $entity = $this->getEntityByIdentifier($entityIdentifier, $conditions, $identifierPropertyPath);
        $this->getEntityManager()->remove($entity);
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Please don't use `@required` for DI. It should only be used in base classes like this one.
     *
     * @return $this
     */
    #[Required]
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * EDT 0.26: Public getter for condition factory
     * Needed by DoctrineResourceType to create ConditionConverter
     */
    public function getConditionFactory(): DqlConditionFactory
    {
        return $this->conditionFactory;
    }

    /**
     * EDT 0.26: Public getter for sort method factory
     * Needed by DoctrineResourceType to create SortMethodConverter
     */
    public function getSortMethodFactory(): SortMethodFactory
    {
        return $this->sortMethodFactory;
    }
}
