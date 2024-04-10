<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use demosplan\DemosPlanCoreBundle\Permissions\ResolvablePermissionCollection;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

/**
 * Zentrale Berechtigungssteuerung fuer Funktionen.
 */
interface PermissionsInterface
{
    /**
     * Initialize all permissions that do not depend on a procedure.
     */
    public function initPermissions(UserInterface $user, array $context = null): self;

    /**
     * Ist die Organisation des angemeldeten Nutzers Inhaberin des Verfahrens?
     */
    public function ownsProcedure(): bool;

    /**
     * Ist der User mit seiner Organisation beteiligt?
     */
    public function isMember(): bool;

    /**
     * Returns active permissionset.
     *
     * @param string $scope
     *
     * @return string
     */
    public function getPermissionset($scope);

    /**
     * Hat der User ein Permissionset Read?
     *
     * @param string|null $scope
     */
    public function hasPermissionsetRead($scope = null): bool;

    /**
     * Hat der User ein Permissionset Write?
     *
     * @param string|null $scope
     */
    public function hasPermissionsetWrite($scope = null): bool;

    /**
     * Setzt das Menue-Highlight eines einzelnen Permissions.
     *
     * @param string $permission
     */
    public function setMenuhighlighting($permission);

    /**
     * Infos zu einem bestimmten Permission
     * Liefert einen Array mit den Informationen zum Permission.
     *
     * @param string $permission
     *
     * @return PermissionsInterface|false
     */
    public function getPermission($permission);

    /**
     * Array aller Permissions mit Name, Label, Enable-Status, und Hightlight-Status
     * Liefert einen Arraallen Permissions.
     */
    public function getPermissions(): array;

    /**
     * checked, ob der Zugriff auf ein konkretes Permission erlaubt ist
     * wenn nicht wird eine Exception geworfen.
     *
     * @param string $permission
     *
     * @throws AccessDeniedException
     */
    public function checkPermission($permission);

    /**
     * Überprüfe mehrere Rechte.
     *
     * @param array|null $permissions
     *
     * @throws AccessDeniedException
     */
    public function checkPermissions($permissions);

    /**
     * Prüfe, oder der User in das Verfahren darf.
     *
     * @throws AccessDeniedException
     */
    public function checkProcedurePermission(): void;

    /**
     * Hat der User die Permission?
     *
     * @param string $permission
     */
    public function hasPermission($permission): bool;

    /**
     * Hat der User die Permissions?
     *
     * @param string $operator AND or OR
     */
    public function hasPermissions(array $permissions, string $operator = 'AND'): bool;

    public function setProcedure(?ProcedureInterface $procedure);

    /**
     * Enable a set of permissions.
     *
     * @param array $permissions permission names
     */
    public function enablePermissions(array $permissions);

    /**
     * Disable a set of permissions.
     *
     * @param array $permissions permission names
     */
    public function disablePermissions(array $permissions);

    /**
     * @deprecated see deprecation on property userInvitedInProcedure
     * @param ProcedureInterface $procedure
     * @param Session $session
     * @return void
     */
    public function evaluateUserInvitedInProcedure(ProcedureInterface $procedure, Session $session): void;

    /**
     * @return ResolvablePermissionCollection[]
     */
    public function getAddonPermissionCollections(): array;
}

