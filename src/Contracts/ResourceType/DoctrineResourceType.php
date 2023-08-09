<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Logic\ApiRequest\FluentRepository;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\InputHandling\RepositoryInterface;
use EDT\JsonApi\RequestHandling\Body\CreationRequestBody;
use EDT\JsonApi\RequestHandling\Body\UpdateRequestBody;
use EDT\JsonApi\ResourceTypes\CachingResourceType;
use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;
use EDT\Querying\Contracts\PropertyPathInterface;
use Exception;
use IteratorAggregate;
use Pagerfanta\Pagerfanta;
use Webmozart\Assert\Assert;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends CachingResourceType<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
 * @template-implements JsonApiResourceTypeInterface<TEntity>
 * @template-implements IteratorAggregate<int, non-empty-string>
 *
 * @property-read End $id
 */
abstract class DoctrineResourceType extends CachingResourceType implements JsonApiResourceTypeInterface, IteratorAggregate, PropertyPathInterface, PropertyAutoPathInterface
{
    use PropertyAutoPathTrait;
    use DoctrineResourceTypeInjectionTrait;

    public function createEntity(CreationRequestBody $requestBody): ?EntityInterface
    {
        try {
            return $this->getTransactionService()->executeAndFlushInTransaction(
                fn () => parent::createEntity($requestBody)
            );
        } catch (Exception $exception) {
            $this->addCreationErrorMessage([]);

            throw $exception;
        }
    }

    public function updateEntity(UpdateRequestBody $requestBody): ?object
    {
        return $this->getTransactionService()->executeAndFlushInTransaction(
            fn () => parent::updateEntity($requestBody)
        );
    }

    public function deleteEntity(string $entityIdentifier): void
    {
        $this->getTransactionService()->executeAndFlushInTransaction(
            fn () => parent::deleteEntity($entityIdentifier)
        );
    }

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

    protected function processProperties(array $properties): array
    {
        return $this->getJsonApiResourceTypeService()->processProperties($this, $properties);
    }

    public function getValidationGroups(): array
    {
        return ['Default'];
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

    public function getEntityAsReadTarget(string $id): object
    {
        return $this->getJsonApiResourceTypeService()->getEntityAsReadTarget($this, $id);
    }

    public function getEntityCount(array $conditions): int
    {
        return $this->getJsonApiResourceTypeService()->getEntityCount($this, $conditions);
    }

    public function getEntityByTypeIdentifier(string $id): object
    {
        return $this->getJsonApiResourceTypeService()->getEntityByTypeIdentifier($this, $id);
    }

    public function listEntityIdentifiers(array $conditions, array $sortMethods): array
    {
        return $this->getJsonApiResourceTypeService()->listEntityIdentifiers($this, $conditions, $sortMethods);
    }
}
