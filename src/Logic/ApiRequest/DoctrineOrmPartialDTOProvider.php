<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Logic\ApiRequest;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\ClauseInterface;
use EDT\DqlQuerying\Contracts\MappingException;
use EDT\DqlQuerying\Contracts\OrderByInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\DqlQuerying\ObjectProviders\DoctrineOrmEntityProvider;
use EDT\DqlQuerying\Utilities\QueryBuilderPreparer;
use EDT\Querying\Contracts\PaginationException;
use EDT\Querying\Contracts\SortMethodInterface;
use EDT\Querying\Pagination\OffsetPagination;
use InvalidArgumentException;

/**
 * Instances of this class will load specific properties only and wrap them in a {@link PartialDTO}.
 *
 * @template-extends DoctrineOrmEntityProvider<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, PartialDto>
 */
class DoctrineOrmPartialDTOProvider extends DoctrineOrmEntityProvider
{
    /**
     * @var array<int, string>
     */
    private $properties;

    /**
     * @param class-string $entityClass
     * @param non-empty-list<non-empty-string> $propertiesToLoad
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        QueryBuilderPreparer $builderPreparer,
        string $entityClass,
        array $propertiesToLoad,
    ) {
        parent::__construct($entityManager, $builderPreparer, $entityClass);
        $this->properties = $propertiesToLoad;
    }

    /**
     * @param array<int,ClauseFunctionInterface<bool>>        $conditions
     * @param array<int,SortMethodInterface|OrderByInterface> $sortMethods
     *
     * @return array<PartialDTO>
     *
     * @throws MappingException
     */
    public function getObjects(array $conditions, array $sortMethods = [], int $offset = 0, int $limit = null): iterable
    {
        $queryBuilder = $this->generateQueryBuilder($conditions, $sortMethods, $offset, $limit);
        $this->replaceSelect($queryBuilder);
        $result = $queryBuilder->getQuery()->getResult();

        return array_map(static fn (array $properties): PartialDTO => new PartialDTO($properties), $result);
    }

    /**
     * @param list<ClauseInterface> $conditions
     * @param list<OrderByInterface> $sortMethods
     * @param OffsetPagination|null $pagination
     *
     * @return list<PartialDTO>
     *
     * @throws MappingException
     * @throws PaginationException
     */
    public function getEntities(array $conditions, array $sortMethods, ?object $pagination): array
    {
        if (null === $pagination) {
            $offset = 0;
            $limit = null;
        } else {
            $offset = $pagination->getOffset();
            $limit = $pagination->getLimit();
        }

        $queryBuilder = $this->generateQueryBuilder($conditions, $sortMethods, $offset, $limit);
        $this->replaceSelect($queryBuilder);
        $result = $queryBuilder->getQuery()->getResult();

        return array_values(array_map(static fn (array $properties): PartialDTO => new PartialDTO($properties), $result));
    }

    /**
     * Replaces the `select` in the {@link QueryBuilder} with a `select` that only loads the
     * properties defined in {@link DoctrineOrmPartialDTOProvider::$properties}.
     *
     * @see https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/reference/partial-objects.html#partial-objects
     */
    protected function replaceSelect(QueryBuilder $queryBuilder)
    {
        // extract the original `select`, because it contains the table alias
        $selects = $queryBuilder->getDQLPart('select');
        $selectsCount = is_countable($selects) ? count($selects) : 0;
        if (1 !== $selectsCount) {
            // we only expect a single `select`, otherwise something is wrong
            throw new InvalidArgumentException("Unexpected number of selects in query. Expected exactly one, got $selectsCount");
        }
        $tableAlias = array_pop($selects);

        // delete the previous `select`
        $queryBuilder->resetDQLPart('select');

        // set the specific properties to load in the `select`
        $properties = array_map(static fn (string $property): string => "$tableAlias.$property", $this->properties);

        $queryBuilder->select(implode(',', $properties));
    }
}
