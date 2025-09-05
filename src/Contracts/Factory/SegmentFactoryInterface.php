<?php
declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;

interface SegmentFactoryInterface
{
    public function createNew(): SegmentInterface;
}
