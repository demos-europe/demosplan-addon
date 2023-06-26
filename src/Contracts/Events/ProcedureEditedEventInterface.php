<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

interface ProcedureEditedEventInterface
{
    public function getProcedureId(): string;
    public function getOriginalProcedureArray(): array;
    public function getInData(): array;
    public function getUser(): UserInterface;
}
