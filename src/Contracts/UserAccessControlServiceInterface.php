<?php
declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\RoleInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserAccessControlInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

interface UserAccessControlServiceInterface
{
    /**
     * Create a user-specific permission.
     */
    public function createUserPermission(UserInterface $user, string $permission, ?RoleInterface $role = null): UserAccessControlInterface;

    /**
     * Remove a user-specific permission.
     */
    public function removeUserPermission(UserInterface $user, string $permission, ?RoleInterface $role = null): bool;

    /**
     * Get all permissions for a user.
     *
     * @return UserAccessControlInterface[]
     */
    public function getUserPermissions(UserInterface $user): array;

    /**
     * Check if a user has a specific permission.
     */
    public function userPermissionExists(UserInterface $user, string $permission, ?RoleInterface $role = null): bool;
}
