<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

use Exception;
use Throwable;

class AddonContentMandatoryFieldsException extends Exception
{
    /** @var array<int, string> */
    private $mandatoryFieldMessages;

    public function __construct(array $mandatoryFieldMessages, $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->mandatoryFieldMessages = $mandatoryFieldMessages;
    }

    /**
     * @return array<int, string>
     */
    public function getMandatoryFieldMessages(): array
    {
        return $this->mandatoryFieldMessages;
    }
}
