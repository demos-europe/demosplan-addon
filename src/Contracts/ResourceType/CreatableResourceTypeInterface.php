<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Permission\PermissionIdentifierInterface;
use EDT\JsonApi\ResourceTypes\CreatableTypeInterface;

interface CreatableResourceTypeInterface extends CreatableTypeInterface
{
    /**
     * Returns the permissions that must (all and each) be enabled for users to be allowed to
     * create resources of this type via JSON:API `create` requests.
     *
     * @return list<PermissionIdentifierInterface>
     */
    public function getRequiredCreatePermissions(): array;
}
