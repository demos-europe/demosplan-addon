<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface StatementCreatedEventInterface
{
    /**
     * @return StatementInterface
     */
    public function getStatement(): StatementInterface;

}
