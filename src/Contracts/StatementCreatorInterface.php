<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface StatementCreatorInterface
{
    public function __invoke( Request $request, string $procedureId): Response;
}