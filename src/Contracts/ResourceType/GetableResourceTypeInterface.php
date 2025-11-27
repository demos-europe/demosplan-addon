<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\GetableTypeInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends GetableTypeInterface<TEntity>
 */
interface GetableResourceTypeInterface extends GetableTypeInterface
{
    /**
     * Returns `true` if users are allowed to fetch resources of this type via JSON:API `get` requests.
     */
    public function isGetAllowed(): bool;
}
