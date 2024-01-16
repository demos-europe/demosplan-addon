<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\StatementCreatorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * This event will be triggered in core when creating a new statement from a simplified form.
 * This event interface allow to retrieve an instance from the StatementFromEmailCreator to create a statement
 * from email when the statement is imported via email.
 *
 * This interface will be implemented only in core.
 */
interface CreateSimplifiedStatementEventInterface
{
    public function getRequest(): Request;

    public function setStatementFromEmailCreator(?StatementCreatorInterface $emailStatementCreator): void;
}
