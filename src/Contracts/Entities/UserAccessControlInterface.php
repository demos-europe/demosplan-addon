<?php
declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;


use DateTime;

interface UserAccessControlInterface
{
    public function getId(): string;

    public function getPermission(): string;

    public function setPermission(string $permission): void;

    public function getUser(): UserInterface;

    public function setUser(UserInterface $user): void;

    public function getOrganisation(): OrgaInterface;

    public function setOrganisation(OrgaInterface $organisation): void;

    public function getRole(): RoleInterface;

    public function setRole(RoleInterface $role): void;

    public function getCustomer(): CustomerInterface;

    public function setCustomer(CustomerInterface $customer): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;
}
