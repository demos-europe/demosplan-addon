<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\FileInterface;
use Throwable;

interface ExternalFileSaverInterface
{
    /**
     * @throws Throwable
     */
    public function save(string $url, ?string $procedureId = null): FileInterface;
}
