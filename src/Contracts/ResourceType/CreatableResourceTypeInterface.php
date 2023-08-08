<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\CreatableTypeInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends CreatableTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
 */
interface CreatableResourceTypeInterface extends CreatableTypeInterface
{
    /**
     * Returns `true` if users are allowed to create resources of this type via JSON:API `create` requests.
     */
    public function isCreateAllowed(): bool;
}
