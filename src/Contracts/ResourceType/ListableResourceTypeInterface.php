<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\JsonApi\ResourceTypes\ListableTypeInterface;

interface ListableResourceTypeInterface extends ListableTypeInterface
{
    /**
     * Returns `true` if users are allowed to fetch resources of this type via JSON:API `list` requests.
     */
    public function isListAllowed(): bool;
}
