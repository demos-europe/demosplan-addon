<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface UserRoleInCustomerInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * Set User.
     */
    public function setUser(UserInterface $user): self;

    /**
     * Get User.
     */
    public function getUser(): UserInterface;

    /**
     * Set Role.
     */
    public function setRole(RoleInterface $role): self;

    /**
     * Get Role.
     */
    public function getRole(): RoleInterface;

    public function setCustomer(?CustomerInterface $customer): self;

    /**
     * Get Customer.
     *
     * @return CustomerInterface|null
     */
    public function getCustomer();

}
