<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;

interface SegmentDeleteEventInterface
{
    public function getSegment(): SegmentInterface;
}
