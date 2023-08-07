<?php

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Logic\ResourceChange;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;

/**
 * @template T of object
 *
 * @template-extends ResourceTypeInterface<T>
 */
interface DeletableDqlResourceTypeInterface extends ResourceTypeInterface
{
    /**
     * @param T $entity
     *
     * @return ResourceChange<T>
     */
    public function delete(object $entity): ResourceChange;
}
