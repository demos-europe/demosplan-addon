<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This interface will be implemented by all statementsCreators in addons
 *
 * This interface will be implemented only in addons and not in the core.
 */
interface StatementCreatorInterface
{
    public function __invoke( Request $request, string $procedureId): Response;
}