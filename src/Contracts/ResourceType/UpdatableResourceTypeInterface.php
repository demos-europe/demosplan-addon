<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\UpdatableTypeInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends UpdatableTypeInterface<TEntity>
 */
interface UpdatableResourceTypeInterface extends UpdatableTypeInterface
{
    /**
     * Return `true` if users are allowed to update resources of this type via JSON:API `update` requests.
     */
    public function isUpdateAllowed(): bool;
}
