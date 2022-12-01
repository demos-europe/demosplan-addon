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
     * Determine if the given permission name is known to this particular evaluator instance at all.
     *
     * As `isPermissionEnabled` will return `false` if a permission is not known, this method can
     * be used beforehand to determine other evaluators should be tried instead.
     *
     * @param non-empty-string $permissionName
     */
    public function isPermissionKnown(string $permissionName): bool;
}
