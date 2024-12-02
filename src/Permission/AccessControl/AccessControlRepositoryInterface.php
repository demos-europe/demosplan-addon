<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\AccessControl;

use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;
use Exception;

interface AccessControlRepositoryInterface
{
    /**
     * Add permission manually.
     *
     * @throws Exception
     */
    public function addManually(
        OrgaInterface $orga,
        CustomerInterface $customer,
        string $roleCode,
        string $permissionName,
    ): void;
}
