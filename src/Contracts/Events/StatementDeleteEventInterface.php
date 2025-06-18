<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface StatementDeleteEventInterface
{
    public function getStatement(): StatementInterface;
}
