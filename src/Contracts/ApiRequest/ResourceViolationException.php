<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Exceptions\ViolationsExceptionInterface;
use InvalidArgumentException;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Throwable;

class ResourceViolationException extends InvalidArgumentException implements ViolationsExceptionInterface
{
    /**
     * @param array<string|GroupSequence> $validationGroups
     * @param non-empty-string $message
     */
    public function __construct(
        protected readonly ConstraintViolationListInterface $violationList,
        protected readonly array $validationGroups,
        string     $message,
        int        $code = 0,
        ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violationList;
    }

    /**
     * @return array<string|GroupSequence>
     */
    public function getValidationGroups(): array
    {
        return $this->validationGroups;
    }
}
