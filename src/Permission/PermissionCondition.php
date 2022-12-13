<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

use Symfony\Component\Validator\Constraints as Assert;
use DemosEurope\DemosplanAddon\Permission\Validation\PermissionFilterConstraint;

/**
 * Provides conditions to determine if a permission should be enabled or not.
 *
 * For a permission to be considered enabled by an instance of this class **all** of the following
 * must be true:
 * * The conditions returned by the {@link self::getCustomerConditions()} must match the current
 * customer context. If the current customer is `null` there must be effectively no customer
 * conditions present.
 * * The conditions returned by the {@link self::getUserConditions()} must match the current
 * user context. If the current user is `null` there must be effectively no user conditions
 * present.
 * * The conditions returned by the {@link self::getProcedureConditions()} must match the current
 * procedure context. If the current procedure is `null` there must be effectively no procedure
 * conditions present.
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
     * @var PermissionFilter
     *
     * @Assert\NotNull()
     * @Assert\Type(type="array")
     * @PermissionFilterConstraint()
     */
    private array $customerConditions;

    /**
     * @var array<non-empty-string, PermissionFilter>
     *
     * @Assert\NotNull()
     * @Assert\Type(type="array")
     * @PermissionFilterConstraint()
     */
    private array $userConditions;

    /**
     * @var array<non-empty-string, PermissionFilter>
     *
     * @Assert\NotNull()
     * @Assert\Type(type="array")
     * @PermissionFilterConstraint()
     */
    private array $procedureConditions;

    /**
     * @param PermissionFilter $customerConditions
     * @param PermissionFilter $userConditions
     * @param PermissionFilter $procedureConditions
     */
    public function __construct(array $customerConditions, array $userConditions, array $procedureConditions)
    {
        $this->customerConditions = $customerConditions;
        $this->userConditions = $userConditions;
        $this->procedureConditions = $procedureConditions;
    }

    /**
     * @return PermissionFilter
     */
    public function getProcedureConditions(): array
    {
        return $this->procedureConditions;
    }

    /**
     * @return PermissionFilter
     */
    public function getUserConditions(): array
    {
        return $this->userConditions;
    }

    /**
     * @return PermissionFilter
     */
    public function getCustomerConditions(): array
    {
        return $this->customerConditions;
    }
}
