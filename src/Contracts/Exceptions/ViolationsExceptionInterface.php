<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ViolationsExceptionInterface extends \Throwable
{
    public function getViolations(): ConstraintViolationListInterface;
}
