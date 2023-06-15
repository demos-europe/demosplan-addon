<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface ProcedureServiceStorageInterface
{
    public function administrationNewHandler(array $data, string $currentUserId): ProcedureInterface;
}
