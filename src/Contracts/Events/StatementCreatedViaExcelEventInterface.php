<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface StatementCreatedViaExcelEventInterface
{
    public function getStatement(): StatementInterface;
}
