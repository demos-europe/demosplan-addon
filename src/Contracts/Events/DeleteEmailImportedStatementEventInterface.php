<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface DeleteEmailImportedStatementEventInterface
{
    public function getStatement(): StatementInterface;
}