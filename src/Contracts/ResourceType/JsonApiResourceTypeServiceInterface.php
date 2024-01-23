<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DateTime;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceConfig\Builder\ResourceConfigBuilderInterface;

/**
 * Classes implementing this interface are intended as helper classes for implementations of
 * {@link JsonApiResourceTypeInterface} only.
 *
 * Do not use this interface or its method in any non-resource-type class.
 */
interface JsonApiResourceTypeServiceInterface
{
    public function listPrefilteredEntities(JsonApiResourceTypeInterface $type, array $dataObjects, array $conditions, array $sortMethods): array;

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

    public function addCreationErrorMessage(array $parameters): void;
}
