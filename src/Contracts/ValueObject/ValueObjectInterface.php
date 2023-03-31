<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ValueObject;

interface ValueObjectInterface
{
    /**
     * ValueObject needs to be locked in order to read values.
     */
    public function lock(): ValueObjectInterface;
}
