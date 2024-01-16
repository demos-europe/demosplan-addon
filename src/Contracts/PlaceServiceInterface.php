<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\PlaceInterface;

interface PlaceServiceInterface
{
    public function findFirstOrderedBySortIndex(string $procedureId): PlaceInterface;
}
