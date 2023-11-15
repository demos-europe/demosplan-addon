<?php

namespace DemosEurope\DemosplanAddon\Exception;

use DemosEurope\DemosplanAddon\Contracts\Exceptions\ViolationsExceptionInterface;
use InvalidArgumentException;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Throwable;

class AddonViolationsException extends InvalidArgumentException implements ViolationsExceptionInterface
{
   public function __construct(
       private readonly ConstraintViolationListInterface $constraintViolationList,
       string $message = "",
       int $code = 0,
       ?Throwable $previous = null
   )
   {
       parent::__construct($message, $code, $previous);
   }
}
