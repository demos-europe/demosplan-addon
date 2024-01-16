<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\ListableTypeInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends ListableTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
 */
interface ListableResourceTypeInterface extends ListableTypeInterface
{
    /**
     * Returns `true` if users are allowed to fetch resources of this type via JSON:API `list` requests.
     */
    public function isListAllowed(): bool;
}
