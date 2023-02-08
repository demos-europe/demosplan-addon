<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

/**
 * This event will be triggered in core when creating a new statement from a simplified form.
 * This event interface allow to retrieve an instance from the StatementFromEmailCreator to create a statement
 * from email when the statement is imported via email.
 *
 * This interface will be implemented only in core.
 */
interface CreateSimplifiedStatementEventInterface
{

}
