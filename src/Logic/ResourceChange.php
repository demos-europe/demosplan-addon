<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Logic;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityChangeInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;

/**
 * This implementation is used in the GenericApiController generic API implementation, which
 * handles as many request handling details as possible but leaves the actual implementation of
 * writing tasks and their details to manually implemented methods. These methods must return
 * {@link ResourceChange} instances, containing the affected entities, so that the generic API
 * implementation can automatically update the database.
 *
 * @template TEntity of EntityInterface
 */
class ResourceChange implements EntityChangeInterface
{
    /**
     * The entities that need to be persisted in the database to apply the changes resulting from the request.
     * Includes {@link targetEntity}.
     *
     * @var array<int,EntityInterface>
     */
    private array $entitiesToPersist = [];

    /**
     * @var array<int,EntityInterface>
     */
    private array $entitiesToDelete = [];

    private bool $unrequestedChangesToTargetResource = false;

    /**
     * @param TEntity $targetEntity the entity backing the resource that was targeted by the request
     * @param ResourceTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity> $targetResourceType
     * @param array<string,mixed> $requestProperties the values in the request that were specified to be set. Additional changes may
     *                                  have been made by the resource type or listeners
     */
    public function __construct(
        private readonly object $targetEntity,
        private readonly ResourceTypeInterface $targetResourceType,
        private readonly array $requestProperties
    ) {}

    public function addEntityToPersist(EntityInterface $entity): void
    {
        $this->entitiesToPersist[] = $entity;
    }

    public function addEntitiesToPersist(array $entities): void
    {
        array_push($this->entitiesToPersist, ...$entities);
    }

    public function getEntitiesToPersist(): array
    {
        return $this->entitiesToPersist;
    }

    public function addEntityToDelete(EntityInterface $entity): void
    {
        $this->entitiesToDelete[] = $entity;
    }

    public function getEntitiesToDelete(): array
    {
        return $this->entitiesToDelete;
    }

    /**
     * @return TEntity
     */
    public function getTargetResource(): object
    {
        return $this->targetEntity;
    }

    /**
     * @return ResourceTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
     */
    public function getTargetResourceType(): ResourceTypeInterface
    {
        return $this->targetResourceType;
    }

    /**
     * Sets {@link unrequestedChangesToTargetResource} to true.
     *
     * Invoke this function if the {@link targetEntity} was not created exactly like specified as
     * defined in {@link getRequestProperties}.
     */
    public function setUnrequestedChangesToTargetResource(): void
    {
        $this->unrequestedChangesToTargetResource = true;
    }

    /**
     * @return bool True if the request had side effects (fields were set in the object beside the ones
     *              specified by the array returned by {@link getRequestProperties}). False otherwise.
     */
    public function getUnrequestedChangesToTargetResource(): bool
    {
        return $this->unrequestedChangesToTargetResource;
    }

    /**
     * The values to be set that were specified in the request. Does not contain additional changes
     * that were potentially made by the backend. E.g. if a resource has a lastModified
     * attribute which is automatically updated then that will **not** be in this array even if it
     * was changed due to some other changes made in the request.
     *
     * @return array<string,mixed> the properties requested to set in the {@link targetEntity}
     */
    public function getRequestProperties(): array
    {
        return $this->requestProperties;
    }
}

