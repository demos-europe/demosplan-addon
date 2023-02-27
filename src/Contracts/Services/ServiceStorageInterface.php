<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services\ServiceStorageInterface;

use Exception;

interface ServiceStorageInterface
{
    /**
     * @throws Exception
     */
    public function administrationGlobalGisHandler(array $data, string $procedureID): array;
}
