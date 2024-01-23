<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

interface ProcedureNewsServiceInterface
{
    /**
     * Ruft alle News eines Verfahrens ab
     * Die News müssen freigeschaltet sein (enable = true).
     *
     * @param string      $procedureId
     * @param string|null $manualSortScope
     *
     * @return array
     */
    public function getProcedureNewsAdminList($procedureId, $manualSortScope = null);
}
