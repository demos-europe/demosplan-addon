<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;


use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface ProcedurePhaseRepositoryInterface
{
    public function getProcedureByInstitutionPhaseId(string $phaseId): ProcedureInterface|null;

    public function getProcedureByPublicParticipationPhaseId(string $phaseId): ProcedureInterface|null;
}
