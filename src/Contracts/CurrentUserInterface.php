<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

interface CurrentUserInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function getUser(): UserInterface;

    public function setUser(UserInterface $user, CustomerInterface $customer = null): void;

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
