<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface ProcedurePhaseDefinitionMarkedAsDeletedEventInterface
{
    public function getPhaseDefinitionId(): string;
}
