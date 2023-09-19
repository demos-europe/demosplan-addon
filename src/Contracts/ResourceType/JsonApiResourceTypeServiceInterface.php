<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DateTime;
use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceConfig\Builder\ResourceConfigBuilderInterface;
use EDT\Querying\Contracts\PathsBasedInterface;
use Pagerfanta\Pagerfanta;

/**
 * Classes implementing this interface are intended as helper classes for implementations of
 * {@link JsonApiResourceTypeInterface} only.
 *
 * Do not use this interface or its method in any non-resource-type class.
 */
interface JsonApiResourceTypeServiceInterface
{
    public function listEntities(JsonApiResourceTypeInterface $type, array $conditions, array $sortMethods): array;

    public function getEntityPaginator(JsonApiResourceTypeInterface $type, ApiPaginationInterface $pagination, array $conditions, array $sortMethods): Pagerfanta;

    public function listPrefilteredEntities(JsonApiResourceTypeInterface $type, array $dataObjects, array $conditions, array $sortMethods): array;

    public function getEntityCount(JsonApiResourceTypeInterface $type, array $conditions): int;

    public function getEntityByTypeIdentifier(JsonApiResourceTypeInterface $type, string $id): object;

    public function listEntityIdentifiers(JsonApiResourceTypeInterface $type, array $conditions, array $sortMethods): array;

    public function getAccessCondition(array $accessConditions): PathsBasedInterface;

    public function formatDate(?DateTime $date): ?string;

    /**
     * @template TEntity of EntityInterface
     *
     * @param JsonApiResourceTypeInterface<TEntity> $type
     * @param ResourceConfigBuilderInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity> $resourceConfigBuilder
     *
     * @return ResourceConfigBuilderInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
     */
    public function processProperties(JsonApiResourceTypeInterface $type, ResourceConfigBuilderInterface $resourceConfigBuilder): ResourceConfigBuilderInterface;

    public function getEntityAsReadTarget(JsonApiResourceTypeInterface $type, string $id): object;

    public function isExposedAsRelationship(JsonApiResourceTypeInterface $type): bool;

    public function addCreationErrorMessage(array $parameters): void;
}
