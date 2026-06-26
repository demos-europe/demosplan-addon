<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedurePhaseDefinitionInterface;

interface ProcedurePhaseDefinitionMarkedAsDeletedEventInterface
{
    public function getPhaseDefinition(): ProcedurePhaseDefinitionInterface;
}
