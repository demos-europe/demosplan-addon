<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

/**
 * @internal For core and {@link AbstractPermissionEvaluator} usage only. Do not use this interface
 *           for dependency injections in classes other than {@link AbstractPermissionEvaluator}!
 *
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
     * Sets a new permission with the given settings or replaces an existing one with the same name.
     *
     * @param non-empty-string          $name
     * @param non-empty-string          $label
     * @param list<PermissionCondition> $permissionConditions
     *
     * @throws PermissionOverrideException permissions defined by the core can not be replaced
     */
    public function setPermission(
        string $name,
        string $label,
        string $description,
        bool $exposed,
        array $permissionConditions
    ): void;
}
