<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

interface ProcedureTypeServiceInterface
{
    public function getProcedureTypeByName(string $name);
}
