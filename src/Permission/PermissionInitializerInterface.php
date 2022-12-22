<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

/**
 * By implementing this interface additional permissions with default settings are added to the system.
 *
 * Both core and addon permissions can then be evaluated by injecting {@link PermissionEvaluatorInterface}.
 */
interface PermissionInitializerInterface
{
    /**
     * Implementations must add their permission with default settings to the given
     * {@link ResolvablePermissionCollectionInterface} (if there are any).
     */
    public function configurePermissions(ResolvablePermissionCollectionInterface $permissionCollection): void;
}
