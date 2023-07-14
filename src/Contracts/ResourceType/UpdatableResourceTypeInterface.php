<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Permission\PermissionIdentifierInterface;
use EDT\JsonApi\ResourceTypes\UpdatableTypeInterface;

interface UpdatableResourceTypeInterface extends UpdatableTypeInterface
{
    /**
     * Returns the permissions that must (all and each) be enabled for users to be allowed to
     * update resources of this type via JSON:API `update` requests.
     *
     * @return list<PermissionIdentifierInterface>
     */
    public function getRequiredUpdatePermissions(): array;
}
