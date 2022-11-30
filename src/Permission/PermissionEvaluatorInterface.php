<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

/**
 * Allows to evaluate if a permission is enabled or disabled.
 */
interface PermissionEvaluatorInterface
{
    /**
     * Evaluate if a permission with the given name is enabled.
     *
     * Will return `false` if the permission is unknown or not accessible by the caller.
     *
     * @param non-empty-string $permissionName
     */
    public function isPermissionEnabled(string $permissionName): bool;

    /**
     * @param non-empty-string $permissionName
     */
    public function isPermissionKnown(string $permissionName): bool;
}
