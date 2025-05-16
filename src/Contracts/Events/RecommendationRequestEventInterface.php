<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface RecommendationRequestEventInterface
{
    public function getStatement(): StatementInterface;
    public function getProcedure(): ProcedureInterface;
}