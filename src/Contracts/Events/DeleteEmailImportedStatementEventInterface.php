<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface StatementPreDeleteEventInterface
{
    public function getStatement(): StatementInterface;
}