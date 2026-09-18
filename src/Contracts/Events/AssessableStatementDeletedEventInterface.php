<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

/**
 * Dispatched for every assessable statement (i.e. not an original statement) that gets deleted,
 * after the deletion has been committed. The statement no longer exists at that point, which is why
 * this event carries the values a listener may still act on instead of the removed entity: its
 * identity, and the procedure it belonged to, which outlives the statement.
 *
 * Deleting the last assessable child of an original statement can, depending on configuration,
 * cascade into deleting the original as well. That cascade fires {@see StatementPreDeleteEventInterface}
 * on its way but does not dispatch this event again for the original.
 */
interface AssessableStatementDeletedEventInterface
{
    public function getStatementId(): string;

    /**
     * The statement's "Aktenzeichen" as shown to caseworkers.
     */
    public function getExternId(): string;

    public function getProcedure(): ProcedureInterface;

    public function wasSegmented(): bool;
}
