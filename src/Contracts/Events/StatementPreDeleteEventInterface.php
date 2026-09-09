<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

/**
 * Despite the generic name, this is dispatched only for original statements about to be
 * deleted, never for assessable (non-original) statements. See {@see AssessableStatementDeletedEventInterface}
 * for the latter.
 */
interface StatementPreDeleteEventInterface
{
    public function getStatement(): StatementInterface;
}