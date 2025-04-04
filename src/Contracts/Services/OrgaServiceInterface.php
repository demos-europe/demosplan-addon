<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;
use Exception;

interface OrgaServiceInterface
{
    /**
     * Gets a list of orgaInterfaces by filter.
     *
     * @param array $filter passed To OrgaRepo::findBy($filter)
     *
     * @return array<int, OrgaInterface>
     *
     * @throws Exception
     */
    public function getOrgaByFields($filter);
}