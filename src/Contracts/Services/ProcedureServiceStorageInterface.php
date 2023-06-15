<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use Exception;

interface ProcedureServiceStorageInterface
{
    public function administrationNewHandler(array $data, string $currentUserId): ProcedureInterface;
    /**
     * @param array  $data
     * @param string $procedureID
     *
     * @return array
     *
     * @throws Exception
     */
    public function administrationGlobalGisHandler($data, $procedureID);
}
