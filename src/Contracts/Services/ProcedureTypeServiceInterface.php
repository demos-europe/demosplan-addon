<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services\ProcedureTypeServiceInterface;

interface ProcedureTypeServiceInterface
{
    public function getProcedureTypeByName(string $name);
}
