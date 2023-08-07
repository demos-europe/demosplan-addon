<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ViolationsExceptionInterface
{
    public function getViolations(): ConstraintViolationListInterface;
}
