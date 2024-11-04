<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface AccessControlInterface
{
    public function getId(): string;
    public function getPermissionName(): string;
    public function setPermissionName(string $permission): void;
    public function setOrga(?OrgaInterface $orga): void;
    public function setRole(?RoleInterface $role): void;
    public function setCustomer(?CustomerInterface $customer): void;
}
