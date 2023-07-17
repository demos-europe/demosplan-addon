<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Allows to evaluate if a permission is enabled or disabled.
 *
 * Can be used by addons for dependency injection and to evaluate permissions, must be implemented
 * by the core only!
 */
interface PermissionEvaluatorInterface
{
    /**
     * Checks if the permission corresponding to the given name is enabled. Throws an exception if not.
     *
     * If a string is given it is assumed that it denotes a core permissions. By passing a
     * {@link PermissionIdentifierInterface} instance both core permissions and addon permissions can be evaluated.
     *
     * @param non-empty-string|PermissionIdentifierInterface $permissionIdentifier
     *
     * @throws AccessDeniedException
     */
    public function requirePermission($permissionIdentifier): void;

     /**
     * Checks if all permissions corresponding to the given names are enabled. Throws an exception if not.
     *
     * If an item is a string it is assumed that it denotes a core permissions. If an item
     * is given as {@link PermissionIdentifierInterface} it can correspond to a core permission or an addon
     * permissions.
     *
     * @param non-empty-list<non-empty-string|PermissionIdentifierInterface> $permissionIdentifiers
     *
     * @throws AccessDeniedException
     */
    public function requireAllPermissions(array $permissionIdentifiers): void;

    /**
     * Evaluate if a permission with the given name is enabled.
     *
     * If a string is given it is assumed that it denotes a core permissions. By passing a
     * {@link PermissionIdentifierInterface} instance both core permissions and addon permissions can be evaluated.
     *
     * Will return `false` if the permission is unknown or not accessible by the caller.
     *
     * @param non-empty-string|PermissionIdentifierInterface $permissionIdentifier
     */
    public function isPermissionEnabled($permissionIdentifier): bool;

    /**
     * Determine if the given permission name is known to this particular evaluator instance at all.
     *
     * If a string is given it is assumed that it denotes a core permissions. By passing a
     * {@link PermissionIdentifierInterface} instance both core permissions and addon permissions can be evaluated.
     *
     * As `isPermissionEnabled` will return `false` if a permission is not known, this method can
     * be used beforehand to determine if other evaluators should be tried instead.
     *
     * @param non-empty-string|PermissionIdentifierInterface $permissionIdentifier
     */
    public function isPermissionKnown($permissionIdentifier): bool;
}
