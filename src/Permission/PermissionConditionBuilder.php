<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

use DemosEurope\DemosplanAddon\Permission\Conditions\AllApply;
use DemosEurope\DemosplanAddon\Permission\Conditions\PropertyHasNotSize;
use DemosEurope\DemosplanAddon\Permission\Conditions\PropertyHasValue;
use DemosEurope\DemosplanAddon\Permission\Conditions\PropertyIsCurrentProcedureId;
use DemosEurope\DemosplanAddon\Permission\Conditions\PropertyIsCurrentUserId;
use DemosEurope\DemosplanAddon\Permission\Conditions\PropertyIsNotNull;
use DemosEurope\DemosplanAddon\Permission\Conditions\UserHasAnyRole;
use DemosEurope\DemosplanAddon\Permission\Conditions\UserIsAuthorized;
use DemosEurope\DemosplanAddon\Permission\Conditions\UserIsInCurrentCustomer;

class PermissionConditionBuilder
{
    /**
     * @var list<PermissionCondition>
     */
    private array $conditions = [];

    private function __construct()
    {
        // private constructor
    }

    public static function start(): self
    {
        return new self();
    }

    /**
     * Permission is enabled regardless of context (customer/user/procedure).
     */
    public function enableAlways(): self
    {
        $this->conditions[] = new PermissionCondition([], [], []);

        return $this;
    }

    public function enableIf(PermissionCondition $condition): self
    {
        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * @return list<PermissionCondition>
     */
    public function build(): array
    {
        return $this->conditions;
    }

    /**
     * @param non-empty-list<non-empty-string> $roles
     */
    public function enableIfUserHasAnyRole(array $roles): self
    {
        $this->conditions[] = new PermissionCondition(
            [],
            new AllApply([
                new UserHasAnyRole($roles),
                new UserIsInCurrentCustomer(),
            ]),
            []
        );

        return $this;
    }

    /**
     * @param non-empty-string $roles
     */
    public function enableIfUserHasRole(string $role): self
    {
        return $this->enableIfUserHasAnyRole([$role]);
    }

    /**
     * Permission is enabled for specific roles that own the procedure via their organisation.
     *
     * @param non-empty-list<non-empty-string> $roles
     */
    public function enableIfProcedureOwnedViaOrganisation(
        array $roles,
        bool $procedureUserRestrictedAccess
    ): self {
        $this->conditions[] = new PermissionCondition(
            [],
            new AllApply([
                // check ownership
                new UserHasAnyRole(['RCOMAU', 'RMOPSA', 'RMOPSD', 'RMOPHA', 'RMOHAW']),
                new UserIsAuthorized($procedureUserRestrictedAccess),
                // check roles
                new UserHasAnyRole($roles),
                new UserIsInCurrentCustomer(),
            ]),
            new AllApply([
                new PropertyHasValue('deleted', false),
                new PropertyIsNotNull('orga.id'),
            ])
        );

        return $this;
    }

    /**
     * Permission is enabled for specific roles that own the procedure via their planning agency.
     *
     * @param non-empty-list<non-empty-string> $roles
     */
    public function enableIfProcedureOwnedViaPlanningAgency(array $roles): self
    {
        $this->conditions[] = new PermissionCondition(
            [],
            new AllApply([
                // check ownership
                new UserHasAnyRole(['RMOPPO']),
                new PropertyIsCurrentProcedureId('orga.administratableProcedures.id'),
                // check roles
                new UserHasAnyRole($roles),
                new UserIsInCurrentCustomer()
            ]),
            new AllApply([
                new PropertyHasValue('deleted', false),
                new PropertyHasNotSize(0, 'planningOffices')
            ]));

        return $this;
    }

    /**
     * Permission is enabled for RDATA roles in the current procedure.
     */
    public function enableIfAllowedAsDataInputOrga(): self
    {
        $this->conditions[] = new PermissionCondition(
            [],
            new AllApply([
                new UserHasAnyRole(['RDATA']),
                new UserIsInCurrentCustomer(),
            ]),
            new PropertyIsCurrentUserId('dataInputOrganisations.users.id')
        );

        return $this;
    }
}
