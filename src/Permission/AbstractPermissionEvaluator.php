<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

/**
 * Every addon is required to implement this class **once** and add their permissions via
 * {@link self::configureAddonPermissions()} to make them available to the core.
 *
 * The implementation can then be injected into instances within the addon to check if addon
 * permissions and core permissions are enabled or disabled.
 */
abstract class AbstractPermissionEvaluator implements PermissionEvaluatorInterface
{
    /**
     * @var ResolvablePermissionCollectionInterface&PermissionEvaluatorInterface
     */
    private ResolvablePermissionCollectionInterface $addonPermission;

    private CorePermissionEvaluatorInterface $corePermissionEvaluator;

    /**
     * @param ResolvablePermissionCollectionInterface&PermissionEvaluatorInterface $addonPermissions
     */
    public function __construct(
        CorePermissionEvaluatorInterface $corePermissionEvaluator,
        ResolvablePermissionCollectionInterface $addonPermissions
    ) {
        $this->addonPermission = $addonPermissions;
        $this->configureAddonPermissions($this->addonPermission);
        $this->corePermissionEvaluator = $corePermissionEvaluator;
    }

    public function isPermissionEnabled(string $permissionName): bool
    {
        if ($this->addonPermission->isPermissionKnown($permissionName)) {
            return $this->addonPermission->isPermissionEnabled($permissionName);
        }

        if ($this->corePermissionEvaluator->isPermissionKnown($permissionName)) {
            return $this->corePermissionEvaluator->isPermissionEnabled($permissionName);
        }

        return false;
    }

    public function isPermissionKnown(string $permissionName): bool
    {
        return $this->addonPermission->isPermissionKnown($permissionName)
            || $this->corePermissionEvaluator->isPermissionKnown($permissionName);
    }

    /**
     * Implementations must add their permission to the given
     * {@link ResolvablePermissionCollectionInterface} (if there are any).
     */
    abstract protected function configureAddonPermissions(
        ResolvablePermissionCollectionInterface $permissionCollection
    ): void;
}
