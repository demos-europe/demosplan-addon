<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use demosplan\DemosPlanCoreBundle\Entity\User\Customer;
use demosplan\DemosPlanCoreBundle\Entity\User\User;
use demosplan\DemosPlanCoreBundle\Permissions\PermissionsInterface;
use demosplan\DemosPlanUserBundle\Exception\UserNotFoundException;

interface CurrentUserInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function getUser(): User;

    public function setUser(User $user, Customer $customer = null): void;

    public function getPermissions(): PermissionsInterface;

    /**
     * @throws UserNotFoundException
     */
    public function hasPermission(string $permission): bool;

    /**
     * Determines if any of the given permissions is currently enabled for the current user.
     */
    public function hasAnyPermissions(string ...$permissions): bool;

    /**
     * Determines if all of the given permission are currently enabled for the current user.
     */
    public function hasAllPermissions(string ...$permissions): bool;
}
