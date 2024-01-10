<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

use Exception;

class AddonPreNewProcedureCreatedEventConcernException extends Exception
{
    /** @var string[] */
    protected $messages = [];

    /**
     * @return string[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string[] $messages
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }
}
