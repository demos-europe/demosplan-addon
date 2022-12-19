<?php

namespace DemosEurope\DemosplanAddon\Exception;

use Exception;

class InvalidStatusTransitionException extends Exception
{
    /**
     * @return InvalidStatusTransitionException
     */
    public static function create(string $currentStatus, string $newStatus): self
    {
        return new self("Invalid status transition $currentStatus => $newStatus");
    }
}

