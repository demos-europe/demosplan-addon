<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\JsonApi\ResourceTypes\GetableTypeInterface;

interface GetableResourceTypeInterface extends GetableTypeInterface
{
    /**
     * Returns `true` if users are allowed to fetch resources of this type via JSON:API `get` requests.
     */
    public function isGetAllowed(): bool;
}
