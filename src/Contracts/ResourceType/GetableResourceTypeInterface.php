<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Permission\PermissionIdentifierInterface;
use EDT\JsonApi\ResourceTypes\GetableTypeInterface;

interface GetableResourceTypeInterface extends GetableTypeInterface
{
    /**
     * Returns the permissions that must (all and each) be enabled for users to be allowed to
     * fetch resources of this type via JSON:API `get` requests.
     *
     * @return list<PermissionIdentifierInterface>
     */
    public function getRequiredGetPermissions(): array;
}
