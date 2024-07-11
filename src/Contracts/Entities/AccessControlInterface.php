<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface AccessControlInterface
{
    public function getPermissionName(): string;
    public function setPermissionName(string $permission): void;
    public function setOrga(?OrgaInterface $orga);
    public function setRole(?RoleInterface $role);
    public function setCustomer(?CustomerInterface $customer);
}
