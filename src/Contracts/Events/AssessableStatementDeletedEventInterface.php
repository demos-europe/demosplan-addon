<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

/**
 * Dispatched for every assessable statement (i.e. not an original statement) that gets deleted.
 * Deleting the last assessable child of an original statement can, depending on configuration,
 * cascade into deleting the original as well. That cascade fires {@see StatementPreDeleteEventInterface}
 * on its way but does not dispatch this event again for the original.
 */
interface AssessableStatementDeletedEventInterface
{
    public function getStatement(): StatementInterface;

    public function wasSegmented(): bool;
}
