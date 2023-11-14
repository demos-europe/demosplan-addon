<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Events\BeforeResourceCreateFlushEvent;
use DemosEurope\DemosplanAddon\Contracts\Events\BeforeResourceUpdateFlushEvent;
use DemosEurope\DemosplanAddon\Logic\ApiRequest\FluentRepository;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\InputHandling\RepositoryInterface;
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
use EDT\Querying\Contracts\PathsBasedInterface;
use EDT\Querying\Contracts\PropertyPathInterface;
use EDT\Wrapping\Contracts\AccessException;
use EDT\Wrapping\Contracts\Types\ExposableRelationshipTypeInterface;
use EDT\Wrapping\Contracts\Types\TransferableTypeInterface;
use EDT\Wrapping\CreationDataInterface;
use EDT\Wrapping\EntityDataInterface;
use EDT\Wrapping\PropertyBehavior\Relationship\RelationshipReadabilityInterface;
use Exception;
use IteratorAggregate;
use League\Fractal\TransformerAbstract;
use Pagerfanta\Pagerfanta;
use Webmozart\Assert\Assert;
use function is_array;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends AbstractResourceType<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
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
     * @var ResourceConfigInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>|null
     */
    private ?ResourceConfigInterface $resourceConfig = null;

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

    // FIXME: validate after creation
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

    // FIXME: respect getAccessConditions and getDefaultSortMethods somehow
    public function mapPaths(array $conditions, array $sortMethods): void
    {
        parent::mapPaths($conditions, $sortMethods);
    }

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
     * @return AttributeConfigBuilder<ClauseFunctionInterface<bool>, TEntity>
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
     * @param PropertyPathInterface&EntityBasedInterface<TRelationship>&ResourceTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TRelationship> $path
     *
     * @return ToOneRelationshipConfigBuilder<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity, TRelationship>
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
     * @param PropertyPathInterface&EntityBasedInterface<TRelationship>&ResourceTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TRelationship> $path
     *
     * @return ToManyRelationshipConfigBuilder<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity, TRelationship>
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
     * @param RelationshipReadabilityInterface<TransferableTypeInterface<PathsBasedInterface, PathsBasedInterface, object>> $readability
     */
    protected function isExposedReadability(RelationshipReadabilityInterface $readability): bool
    {
        $relationshipType = $readability->getRelationshipType();

        return $relationshipType instanceof ExposableRelationshipTypeInterface
            && $relationshipType->isExposedAsRelationship();
    }

    /**
     * Array order: Even though the order of the properties returned within the array may have an
     * effect (e.g. determining the order of properties in JSON:API responses) you can not rely on
     * these effects; they may be changed in the future.
     *
     * @return list<AttributeConfigBuilder<ClauseFunctionInterface<bool>, TEntity>|ToOneRelationshipConfigBuilder<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity, object>|ToManyRelationshipConfigBuilder<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity, object>>|ResourceConfigBuilderInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
     */
    abstract protected function getProperties(): array|ResourceConfigBuilderInterface;

    public function getTransformer(): TransformerAbstract
    {
        return new DynamicTransformer(
            $this,
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

    public function listEntities(array $conditions, array $sortMethods = []): array
    {
        return $this->getJsonApiResourceTypeService()->listEntities($this, $conditions, $sortMethods);
    }

    public function getEntityPaginator(ApiPaginationInterface $pagination, array $conditions, array $sortMethods = []): Pagerfanta
    {
        return $this->getJsonApiResourceTypeService()->getEntityPaginator($this, $pagination, $conditions, $sortMethods);
    }

    public function listPrefilteredEntities(array $dataObjects, array $conditions = [], array $sortMethods = []): array
    {
        return $this->getJsonApiResourceTypeService()->listPrefilteredEntities($this, $dataObjects, $conditions, $sortMethods);
    }

    public function getEntityCount(array $conditions): int
    {
        return $this->getJsonApiResourceTypeService()->getEntityCount($this, $conditions);
    }

    public function listEntityIdentifiers(array $conditions, array $sortMethods): array
    {
        return $this->getJsonApiResourceTypeService()->listEntityIdentifiers($this, $conditions, $sortMethods);
    }
}
