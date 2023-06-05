<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use Exception;

interface MapServiceStorageInterface
{
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
