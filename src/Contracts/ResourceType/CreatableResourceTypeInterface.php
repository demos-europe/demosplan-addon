<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\JsonApi\ResourceTypes\CreatableTypeInterface;

interface CreatableResourceTypeInterface extends CreatableTypeInterface
{
    /**
     * Returns `true` if users are allowed to create resources of this type via JSON:API `create` requests.
     */
    public function isCreateAllowed(): bool;
}
