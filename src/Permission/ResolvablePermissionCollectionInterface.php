<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

use DemosEurope\DemosplanAddon\DemosPipes\Configuration\PermissionEnabler;

/**
 * @phpstan-type Group = array{
 *            conjunction: non-empty-string,
 *            memberOf?: non-empty-string
 *          }
 * @phpstan-type Condition = array{
 *            path: non-empty-string,
 *            value?: mixed,
 *            operator?: non-empty-string,
 *            memberOf?: non-empty-string
 *          }
 * @phpstan-type ParameterCondition = array{
 *            path: non-empty-string,
 *            parameter: '$currentUserId'|'$currentCustomerId'|'$currentProcedureId',
 *            operator: non-empty-string,
 *            memberOf?: non-empty-string
 *          }
 * @phpstan-type PermissionFilter = array{
 *            condition: Condition
 *          }|array{
 *            group: Group
 *          }|array{
 *            parameterCondition: ParameterCondition
 *          }
 */
interface ResolvablePermissionCollectionInterface
{
    /**
     * Sets a new permission with the given settings or replaces an existing one that was previously
     * configured into this instance.
     *
     * @param non-empty-string          $name
     * @param non-empty-string          $label
     * @param list<PermissionCondition> $permissionConditions on permission checks each item will be
     *                                                        evaluated, if none matches the permission
     *                                                        is disabled, otherwise it is enabled
     *
     * @throws PermissionOverrideException permissions defined by the core can not be replaced
     */
    public function configurePermission(
        string $name,
        string $label,
        string $description,
        bool $exposed,
        array $permissionConditions
    ): void;


    public function configurePermissionInstance(
        PermissionMetaInterface $permission,
        PermissionEnabler $permissionConditionBuilder
    ): void;
}
