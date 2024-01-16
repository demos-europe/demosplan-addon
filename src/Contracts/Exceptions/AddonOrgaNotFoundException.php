<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

class AddonOrgaNotFoundException extends AddonResourceNotFoundException
{
    public static function createFromId(string $id): AddonOrgaNotFoundException
    {
        return new self("Orga with ID {$id} was not found.");
    }
}
