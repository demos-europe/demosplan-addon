<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Permission\PermissionIdentifierInterface;
use EDT\Wrapping\Contracts\Types\IdDeletableTypeInterface;

interface DeletableResourceTypeInterface extends IdDeletableTypeInterface
{
    /**
     * Returns the permissions that must (all and each) be enabled for users to be allowed to
     * delete resources of this type via JSON:API `delete` requests.
     *
     * @return list<PermissionIdentifierInterface>
     */
    public function getRequiredDeletionPermissions(): array;
}
