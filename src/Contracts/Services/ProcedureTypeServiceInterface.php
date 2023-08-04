<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureTypeInterface;

interface ProcedureTypeServiceInterface
{
    public function getProcedureTypeByName(string $name): ?ProcedureTypeInterface;
}
