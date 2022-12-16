<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class UserIsAuthorized extends AbstractCondition
{
    private bool $procedureUserRestrictedAccess;

    public function __construct(bool $procedureUserRestrictedAccess)
    {
        $this->procedureUserRestrictedAccess = $procedureUserRestrictedAccess;
    }

    public function toCondition(): array
    {
        $isAuthorizedViaOrgaOrManually = $this->procedureUserRestrictedAccess
            ? new AnyApplies([
                new PropertyIsCurrentProcedureId('orga.administratableProcedures.id'), // isAuthorizedViaPlanningAgency
                new PropertyIsCurrentProcedureId('authorizedProcedures.id'), // userIsAuthorized
            ])
            : new PropertyIsCurrentProcedureId('orga.procedures.id');

        return $isAuthorizedViaOrgaOrManually->toCondition();
    }
}
