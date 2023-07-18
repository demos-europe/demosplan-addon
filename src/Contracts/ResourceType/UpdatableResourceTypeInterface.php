<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\JsonApi\ResourceTypes\UpdatableTypeInterface;

interface UpdatableResourceTypeInterface extends UpdatableTypeInterface
{
    /**
     * Return `true` if users are allowed to update resources of this type via JSON:API `update` requests.
     */
    public function isUpdateAllowed(): bool;
}
