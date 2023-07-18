<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\Wrapping\Contracts\Types\IdDeletableTypeInterface;

interface DeletableResourceTypeInterface extends IdDeletableTypeInterface
{
    /**
     * Returns `true` if users are allowed to delete resources of this type via JSON:API `delete` requests.
     */
    public function isDeleteAllowed(): bool;
}
