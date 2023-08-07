<?php

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

use Exception;

class AddonResourceNotFoundException extends Exception
{
    public static function createResourceNotFoundException(string $typeName, string $id): self
    {
        return new self("No resource available for the type {$typeName} and ID {$id}");
    }
}
