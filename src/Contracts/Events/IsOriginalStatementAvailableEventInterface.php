<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface IsOriginalStatementAvailableEventInterface
{
    public function setIsOriginalStatementAvailable(bool $isOriginalStatementAvailable): void;
}
