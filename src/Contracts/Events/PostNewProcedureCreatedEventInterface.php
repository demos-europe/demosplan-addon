<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface PostNewProcedureCreatedEventInterface
{
    public function getProcedure(): ProcedureInterface;

    public function getToken(): ?string;
}
