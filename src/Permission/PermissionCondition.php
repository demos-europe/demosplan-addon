<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

use DemosEurope\DemosplanAddon\Permission\Conditions\AbstractCondition;
use Symfony\Component\Validator\Constraints as Assert;
use DemosEurope\DemosplanAddon\Permission\Validation\PermissionFilterConstraint;

/**
 * Provides conditions to determine if a permission should be enabled or not.
 *
 * Use instances of this class when calling {@link ResolvablePermissionCollectionInterface::configurePermission()}
 * within your {@link AbstractPermissionEvaluator::configureAddonPermissions()} implementation.
 *
 * For a permission to be considered enabled by an instance of this class **all** of the following
 * must be true:
 *
 * * The conditions returned by the {@link self::getCustomerConditions()} must match the current
 * customer context or be effectively empty.
 *
 * * The conditions returned by the {@link self::getUserConditions()} must match the current
 * user context or be effectively empty.
 *
 * * The conditions returned by the {@link self::getProcedureConditions()} must match the current
 * procedure context or be effectively empty.
 *
 * Having *effectively* no conditions present means that the returned array does not need to be
 * empty. It may contain empty groups or conditions that are members of non-existent groups only.
 * In such cases the array will be considered effectively empty, as such definitions will be
 * ignored when parsed.
 *
 * @phpstan-import-type PermissionFilter from ResolvablePermissionCollectionInterface
 */
class PermissionCondition
{
    /**
     * @var array<non-empty-string, PermissionFilter>
     *
     * @Assert\All([
     *     @Assert\NotNull(),
     *     @Assert\Type(type="array"),
     *     @PermissionFilterConstraint()
     * ])
     */
    private array $customerConditions;

    /**
     * @var array<non-empty-string, PermissionFilter>
     *
     * @Assert\All([
     *     @Assert\NotNull(),
     *     @Assert\Type(type="array"),
     *     @PermissionFilterConstraint()
     * ])
     */
    private array $userConditions;

    /**
     * @var array<non-empty-string, PermissionFilter>
     *
     * @Assert\All([
     *     @Assert\NotNull(),
     *     @Assert\Type(type="array"),
     *     @PermissionFilterConstraint()
     * ])
     */
    private array $procedureConditions;

    /**
     * Initialize an instance with the given conditions.
     *
     * The `PermissionFilter` format extends the Drupal filter
     * {@link https://www.drupal.org/docs/core-modules-and-themes/core-modules/jsonapi-module/filtering specification}.
     *
     * Beside additional operators it also adds support for the `parameterCondition` type, which
     * works like the `condition` type, except that it does not contain a `value` field with a predefined
     * value, but a `parameter`field. The `parameter` field accepts specific placeholders, which are
     * replaced with the actual value when the permission is evaluated. For supported placeholders
     * and other details see the `PermissionFilter` format type-definition.
     *
     * @param array<non-empty-string, PermissionFilter>|AbstractCondition $customerConditions
     * @param array<non-empty-string, PermissionFilter>|AbstractCondition $userConditions
     * @param array<non-empty-string, PermissionFilter>|AbstractCondition $procedureConditions
     */
    public function __construct($customerConditions, $userConditions, $procedureConditions)
    {
        $this->customerConditions = $customerConditions instanceof AbstractCondition
            ? $customerConditions->toCondition()
            : $customerConditions;
        $this->userConditions = $userConditions instanceof AbstractCondition
            ? $userConditions->toCondition()
            : $userConditions;
        $this->procedureConditions =$procedureConditions instanceof AbstractCondition
            ? $procedureConditions->toCondition()
            : $procedureConditions;
    }

    /**
     * @return array<non-empty-string, PermissionFilter>
     */
    public function getProcedureConditions(): array
    {
        return $this->procedureConditions;
    }

    /**
     * @return array<non-empty-string, PermissionFilter>
     */
    public function getUserConditions(): array
    {
        return $this->userConditions;
    }

    /**
     * @return array<non-empty-string, PermissionFilter>
     */
    public function getCustomerConditions(): array
    {
        return $this->customerConditions;
    }
}
