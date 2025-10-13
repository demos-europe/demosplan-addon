<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Events\BeforeResourceCreateFlushEvent;
use DemosEurope\DemosplanAddon\Contracts\Events\BeforeResourceUpdateFlushEvent;
use DemosEurope\DemosplanAddon\Logic\ApiRequest\FluentRepository;
use EDT\ConditionFactory\DrupalFilterInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\InputHandling\ConditionConverter;
use EDT\JsonApi\InputHandling\RepositoryInterface;
use EDT\JsonApi\InputHandling\SortMethodConverter;
use EDT\JsonApi\OutputHandling\DynamicTransformer;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilder;
use EDT\JsonApi\PropertyConfig\Builder\IdentifierConfigBuilder;
use EDT\JsonApi\PropertyConfig\Builder\ToManyRelationshipConfigBuilder;
use EDT\JsonApi\PropertyConfig\Builder\ToOneRelationshipConfigBuilder;
use EDT\JsonApi\RequestHandling\ModifiedEntity;
use EDT\JsonApi\ResourceConfig\Builder\ResourceConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\UnifiedResourceConfigBuilder;
use EDT\JsonApi\ResourceConfig\ResourceConfigInterface;
use EDT\JsonApi\ResourceTypes\AbstractResourceType;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;
use EDT\Querying\Contracts\EntityBasedInterface;
use EDT\Querying\Contracts\PropertyPathInterface;
use EDT\Querying\Pagination\PagePagination;
use EDT\Wrapping\Contracts\AccessException;
use EDT\Wrapping\Contracts\Types\TransferableTypeInterface;
use EDT\Wrapping\CreationDataInterface;
use EDT\Wrapping\EntityDataInterface;
use EDT\Wrapping\ResourceBehavior\ResourceInstantiability;
use EDT\Wrapping\ResourceBehavior\ResourceReadability;
use EDT\Wrapping\ResourceBehavior\ResourceUpdatability;
use Exception;
use IteratorAggregate;
use League\Fractal\TransformerAbstract;
use Pagerfanta\Pagerfanta;
use Webmozart\Assert\Assert;
use function is_array;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends AbstractResourceType<TEntity>
 * @template-implements JsonApiResourceTypeInterface<TEntity>
 * @template-implements IteratorAggregate<int, non-empty-string>
 *
 * @property-read End $id
 */
abstract class DoctrineResourceType extends AbstractResourceType implements JsonApiResourceTypeInterface, IteratorAggregate, PropertyPathInterface, PropertyAutoPathInterface
{
    use PropertyAutoPathTrait;
    use DoctrineResourceTypeInjectionTrait;

    /**
     * @var ResourceConfigInterface<TEntity>|null
     */
    private ?ResourceConfigInterface $resourceConfig = null;

    /**
     * EDT 0.26: Converter for predefined conditions to DQL conditions
     *
     * @var ConditionConverter<ClauseFunctionInterface<bool>>|null
     */
    private ?ConditionConverter $conditionConverter = null;

    /**
     * EDT 0.26: Converter for predefined sort methods to DQL sort methods
     *
     * @var SortMethodConverter<OrderBySortMethodInterface>|null
     */
    private ?SortMethodConverter $sortMethodConverter = null;

    protected function getResourceConfig(): ResourceConfigInterface
    {
        if (null === $this->resourceConfig) {
            $configBuilder = $this->getProperties();
            if (is_array($configBuilder)) {
                $namedProperties = [];
                foreach ($configBuilder as $property) {
                    $propertyName = $property->getName();
                    Assert::keyNotExists($namedProperties, $propertyName);
                    $namedProperties[$propertyName] = $property;
                }
                $configBuilder = new UnifiedResourceConfigBuilder($this->getEntityClass(), $namedProperties);
            }
            $configBuilder = $this->getJsonApiResourceTypeService()->processProperties($this, $configBuilder);
            $this->resourceConfig = $configBuilder->build();
        }

        return $this->resourceConfig;
    }

    public function createEntity(CreationDataInterface $entityData): ModifiedEntity
    {
        try {
            return $this->getTransactionService()->executeAndFlushInTransaction(
                function () use ($entityData): ModifiedEntity {
                    $modifiedEntity = parent::createEntity($entityData);
                    $this->eventDispatcher->dispatch(new BeforeResourceCreateFlushEvent(
                        $this,
                        $modifiedEntity->getEntity()
                    ));

                    return $modifiedEntity;
                }
            );
        } catch (Exception $exception) {
            $this->addCreationErrorMessage([]);

            throw $exception;
        }
    }

    public function updateEntity(string $entityId, EntityDataInterface $entityData): ModifiedEntity
    {
        return $this->getTransactionService()->executeAndFlushInTransaction(
            function () use ($entityId, $entityData): ModifiedEntity {
                $modifiedEntity = parent::updateEntity($entityId, $entityData);
                $this->eventDispatcher->dispatch(new BeforeResourceUpdateFlushEvent(
                    $this,
                    $modifiedEntity->getEntity()
                ));

                return $modifiedEntity;
            }
        );
    }

    public function deleteEntity(string $entityIdentifier): void
    {
        $this->getTransactionService()->executeAndFlushInTransaction(
            fn () => parent::deleteEntity($entityIdentifier)
        );
    }

    /**
     * @return FluentRepository<TEntity>
     */
    protected function getRepository(): RepositoryInterface
    {
        $repository = $this->getEntityManager()->getRepository($this->getEntityClass());
        $fluentRepositoryClass = FluentRepository::class;
        Assert::isInstanceOf(
            $repository,
            $fluentRepositoryClass,
            "No repository found extending `$fluentRepositoryClass` for entity `{$this->getEntityClass()}`."
        );

        return $repository;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function addCreationErrorMessage(array $parameters): void
    {
        $this->getJsonApiResourceTypeService()->addCreationErrorMessage($parameters);
    }

    public function getDefaultSortMethods(): array
    {
        return [];
    }

    /**
     * @return IdentifierConfigBuilder<TEntity>
     */
    protected function createIdentifier(): IdentifierConfigBuilder
    {
        return $this->getPropertyBuilderFactory()->createIdentifier($this->getEntityClass());
    }

    /**
     * @return AttributeConfigBuilder<TEntity>
     */
    protected function createAttribute(PropertyPathInterface $path): AttributeConfigBuilder
    {
        return $this->getPropertyBuilderFactory()->createAttribute(
            $this->getEntityClass(),
            $path
        );
    }

    /**
     * @template TRelationship of object
     *
     * @param PropertyPathInterface&EntityBasedInterface<TRelationship>&ResourceTypeInterface<TRelationship> $path
     *
     * @return ToOneRelationshipConfigBuilder<TEntity, TRelationship>
     */
    protected function createToOneRelationship(
        PropertyPathInterface&ResourceTypeInterface $path
    ): ToOneRelationshipConfigBuilder {
        // Even though $path is already a ResourceTypeInterface, it is not the actual
        // instance but one that was created via reflection for path purposes only and thus not
        // sufficient for further processing.
        $relationshipType = $this->getTypeProvider()->getTypeByIdentifier($path->getTypeName());
        Assert::notNull($relationshipType);

        $configBuilder = $this->getPropertyBuilderFactory()->createToOneWithType(
            $this->getEntityClass(),
            $relationshipType->getEntityClass(),
            $path
        );
        $configBuilder->setRelationshipType($relationshipType);

        return $configBuilder;
    }

    /**
     * @template TRelationship of object
     *
     * @param PropertyPathInterface&EntityBasedInterface<TRelationship>&ResourceTypeInterface<TRelationship> $path
     *
     * @return ToManyRelationshipConfigBuilder<TEntity, TRelationship>
     */
    protected function createToManyRelationship(
        PropertyPathInterface&ResourceTypeInterface $path
    ): ToManyRelationshipConfigBuilder {
        // Even though $path is already a ResourceTypeInterface, it is not the actual
        // instance but one that was created via reflection for path purposes only and thus not
        // sufficient for further processing.
        $relationshipType = $this->getTypeProvider()->getTypeByIdentifier($path->getTypeName());
        Assert::notNull($relationshipType);

        $configBuilder = $this->getPropertyBuilderFactory()->createToManyWithType(
            $this->getEntityClass(),
            $relationshipType->getEntityClass(),
            $path
        );
        $configBuilder->setRelationshipType($relationshipType);

        return $configBuilder;
    }

    /**
     * Array order: Even though the order of the properties returned within the array may have an
     * effect (e.g. determining the order of properties in JSON:API responses) you can not rely on
     * these effects; they may be changed in the future.
     *
     * @return list<AttributeConfigBuilder<TEntity>|ToOneRelationshipConfigBuilder<TEntity, object>|ToManyRelationshipConfigBuilder<TEntity, object>>|ResourceConfigBuilderInterface<TEntity>
     */
    abstract protected function getProperties(): array|ResourceConfigBuilderInterface;

    public function getTransformer(): TransformerAbstract
    {
        return new DynamicTransformer(
            $this->getTypeName(),
            $this->getEntityClass(),
            $this->getReadability(),
            $this->getMessageFormatter(),
            $this->getApiLogger()
        );
    }

    public function getUpdateValidationGroups(): array
    {
        return [ProcedureInterface::VALIDATION_GROUP_DEFAULT];
    }

    public function getCreationValidationGroups(): array
    {
        return [ProcedureInterface::VALIDATION_GROUP_DEFAULT];
    }

    public function getEntity(string $identifier): object
    {
        if (!$this->isAvailable()) {
            throw AccessException::typeNotAvailable($this);
        }

        try {
            return parent::getEntity($identifier);
        } catch (AccessException $e) {
            throw new \InvalidArgumentException("Could not retrieve entity for type '{$this->getTypeName()}' with ID '$identifier'.", 0, $e);
        }
    }

    /**
     * This method determines the property within an entity that should be used as ID.
     *
     * Not all entities use `id` for this, some use `ident`. The default is set to `id` though.
     *
     * It must return an array with a single item, as support for ID properties nested in relationship was not added yet.
     *
     * @return array{0: non-empty-string}
     */
    public function getIdentifierPropertyPath(): array
    {
        return $this->id->getAsNames();
    }

    /**
     * EDT 0.26: Separate predefined from DQL conditions and map paths only on predefined ones.
     *
     * mapPaths() expects PathAdjustableInterface which predefined types implement but DQL types don't.
     * We must separate conditions first, map only predefined, then convert all predefined to DQL.
     *
     * @param array<int, DrupalFilterInterface|ClauseFunctionInterface<bool>> $conditions
     * @param array<int, mixed> $sortMethods
     * @return array{conditions: array<int, ClauseFunctionInterface<bool>>, sortMethods: array<int, OrderBySortMethodInterface>}
     */
    protected function mapAndConvertConditionsAndSorts(array $conditions, array $sortMethods): array
    {
        // Separate predefined from DQL conditions
        $predefinedConditions = [];
        $dqlConditions = [];

        foreach ($conditions as $condition) {
            if ($condition instanceof DrupalFilterInterface) {
                $predefinedConditions[] = $condition;
            } else {
                $dqlConditions[] = $condition;
            }
        }

        // Only map paths on predefined types (they implement PathAdjustableInterface)
        if ([] !== $predefinedConditions || [] !== $sortMethods) {
            $this->mapPaths($predefinedConditions, $sortMethods);
        }

        // Convert predefined conditions to DQL
        if ([] !== $predefinedConditions) {
            // Initialize converter lazily
            if (null === $this->conditionConverter) {
                $repository = $this->getRepository();
                $dqlConditionFactory = $repository->getConditionFactory();
                $this->conditionConverter = ConditionConverter::createDefault($this->getEdtValidator(), $dqlConditionFactory);
            }

            $convertedConditions = $this->conditionConverter->convertConditions($predefinedConditions);
            $dqlConditions = array_merge($dqlConditions, $convertedConditions);
        }

        // Convert predefined sort methods to DQL
        $dqlSortMethods = [];
        if ([] !== $sortMethods) {
            if (null === $this->sortMethodConverter) {
                $repository = $this->getRepository();
                $dqlSortMethodFactory = $repository->getSortMethodFactory();
                $this->sortMethodConverter = SortMethodConverter::createDefault($this->getEdtValidator(), $dqlSortMethodFactory);
            }
            $dqlSortMethods = $this->sortMethodConverter->convertSortMethods($sortMethods);
        }

        return [
            'conditions' => $dqlConditions,
            'sortMethods' => $dqlSortMethods,
        ];
    }

    /**
     * EDT 0.26: Convert predefined conditions (DrupalFilterInterface) to DQL conditions (ClauseFunctionInterface).
     *
     * @deprecated Use mapAndConvertConditionsAndSorts() instead to properly handle path mapping
     *
     * @param array<int, DrupalFilterInterface|ClauseFunctionInterface<bool>> $conditions
     * @return array<int, ClauseFunctionInterface<bool>>
     */
    protected function convertPredefinedConditionsToDql(array $conditions): array
    {
        $result = $this->mapAndConvertConditionsAndSorts($conditions, []);
        return $result['conditions'];
    }

    /**
     * EDT 0.26: Convert predefined sort methods to DQL sort methods (OrderBySortMethodInterface).
     *
     * In EDT 0.26, sort methods from JSON:API come as predefined types, but FluentRepository
     * expects DQL sort methods. We need to convert before merging with default sort methods.
     *
     * @param array<int, mixed> $sortMethods
     * @return array<int, OrderBySortMethodInterface>
     */
    protected function convertPredefinedSortMethodsToDql(array $sortMethods): array
    {
        if ([] === $sortMethods) {
            return [];
        }

        // Initialize converter lazily
        if (null === $this->sortMethodConverter) {
            // Get DqlSortMethodFactory from repository
            $repository = $this->getRepository();
            $dqlSortMethodFactory = $repository->getSortMethodFactory();

            // Create converter that converts FROM predefined TO DQL
            $this->sortMethodConverter = SortMethodConverter::createDefault($this->getEdtValidator(), $dqlSortMethodFactory);
        }

        // Convert all sort methods (assuming they're all predefined from JSON:API)
        return $this->sortMethodConverter->convertSortMethods($sortMethods);
    }

    public function getEntityPaginator(ApiPaginationInterface $pagination, array $conditions, array $sortMethods = []): Pagerfanta
    {
        if (!$this->isAvailable()) {
            throw AccessException::typeNotAvailable($this);
        }

        // EDT 0.26: Separate, map, and convert predefined to DQL
        $converted = $this->mapAndConvertConditionsAndSorts($conditions, $sortMethods);
        $conditions = array_merge($converted['conditions'], $this->getAccessConditions());
        $sortMethods = array_merge($converted['sortMethods'], $this->getDefaultSortMethods());
        $pagePagination = new PagePagination($pagination->getSize(), $pagination->getNumber());

        return $this->getRepository()->getEntitiesForPage($conditions, $sortMethods, $pagePagination);
    }

    /**
     * EDT 0.26: Override to apply condition and sort method conversion.
     *
     * AbstractResourceType has a getEntitiesForPage() method that directly calls the repository.
     * We need to override it to convert predefined conditions/sorts to DQL before passing to repository.
     */
    public function getEntitiesForPage(array $conditions, array $sortMethods, PagePagination $pagination): Pagerfanta
    {
        // EDT 0.26: Separate, map, and convert predefined to DQL
        $converted = $this->mapAndConvertConditionsAndSorts($conditions, $sortMethods);
        $conditions = array_merge($converted['conditions'], $this->getAccessConditions());
        $sortMethods = array_merge($converted['sortMethods'], $this->getDefaultSortMethods());

        return $this->getRepository()->getEntitiesForPage($conditions, $sortMethods, $pagination);
    }

    public function listPrefilteredEntities(array $dataObjects, array $conditions = [], array $sortMethods = []): array
    {
        if (!$this->isAvailable()) {
            throw AccessException::typeNotAvailable($this);
        }

        // EDT 0.26: Separate, map, and convert predefined to DQL
        $converted = $this->mapAndConvertConditionsAndSorts($conditions, $sortMethods);
        $conditions = array_merge($converted['conditions'], $this->getAccessConditions());
        $sortMethods = array_merge($converted['sortMethods'], $this->getDefaultSortMethods());

        return $this->getJsonApiResourceTypeService()->listPrefilteredEntities($this, $dataObjects, $conditions, $sortMethods);
    }

    public function getEntityCount(array $conditions): int
    {
        if (!$this->isAvailable()) {
            throw AccessException::typeNotAvailable($this);
        }

        $this->mapPaths($conditions, []);
        // EDT 0.26: Convert predefined conditions to DQL before merging with access conditions
        $conditions = $this->convertPredefinedConditionsToDql($conditions);
        $conditions = array_merge($conditions, $this->getAccessConditions());

        return $this->getRepository()->getEntityCount($conditions);
    }

    public function listEntityIdentifiers(array $conditions, array $sortMethods): array
    {
        if (!$this->isAvailable()) {
            throw AccessException::typeNotAvailable($this);
        }

        // EDT 0.26: Separate, map, and convert predefined to DQL
        $converted = $this->mapAndConvertConditionsAndSorts($conditions, $sortMethods);
        $conditions = array_merge($converted['conditions'], $this->getAccessConditions());
        $sortMethods = array_merge($converted['sortMethods'], $this->getDefaultSortMethods());
        $entityIdentifierPropertyPath = $this->getIdentifierPropertyPath();

        return $this->getRepository()->getEntityIdentifiers($conditions, $sortMethods, array_pop($entityIdentifierPropertyPath));
    }

    /**
     * Will return all entities matching the given condition with the specified sorting.
     *
     * For all properties accessed while filtering/sorting it is checked if:
     *
     * FIXME: is this still true? if not it probably needs to be implemented
     * * the given type and the types in the property paths are {@link self::isAvailable() available at all} and {@link TransferableTypeInterface readable}
     * * the property is available for {@link FilteringTypeInterface::getFilteringProperties() filtering}/{@link SortingTypeInterface::getSortingProperties() sorting}
     *
     * @param list<ClauseFunctionInterface<bool>> $conditions  Always conjuncted as AND. Order does not matter
     * @param list<OrderBySortMethodInterface> $sortMethods Order matters. Lower positions imply higher priority. I.e. a second
     *                                               sort method will be applied to each subset individually that
     *                                               resulted from the first sort method.
     *
     * @throws AccessException thrown if the resource type denies the currently logged-in user
     *                         the access to the resource type needed to fulfill the request
     */
    public function getEntities(array $conditions, array $sortMethods): array
    {
        if (!$this->isAvailable()) {
            throw AccessException::typeNotAvailable($this);
        }

        // EDT 0.26: Separate, map, and convert predefined to DQL
        $converted = $this->mapAndConvertConditionsAndSorts($conditions, $sortMethods);
        $conditions = array_merge($converted['conditions'], $this->getAccessConditions());
        $sortMethods = array_merge($converted['sortMethods'], $this->getDefaultSortMethods());

        return $this->getRepository()->getEntities($conditions, $sortMethods);
    }

    public function getReadability(): ResourceReadability
    {
        return $this->getResourceConfig()->getReadability();
    }

    public function getFilteringProperties(): array
    {
        return $this->getResourceConfig()->getFilteringProperties();
    }

    public function getSortingProperties(): array
    {
        return $this->getResourceConfig()->getSortingProperties();
    }

    public function getUpdatability(): ResourceUpdatability
    {
        return $this->getResourceConfig()->getUpdatability();
    }

    protected function getInstantiability(): ResourceInstantiability
    {
        return $this->getResourceConfig()->getInstantiability();
    }
}
