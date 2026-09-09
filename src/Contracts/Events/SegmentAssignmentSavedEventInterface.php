<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\PlaceInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

/**
 * Dispatched after a segment's assignee and/or workflow place has actually changed.
 * {@see getSegment()} already reflects the new values; {@see getPreviousAssignee()} and
 * {@see getPreviousPlace()} carry what they were before this change.
 */
interface SegmentAssignmentSavedEventInterface
{
    public function getSegment(): SegmentInterface;

    public function getPreviousAssignee(): ?UserInterface;

    public function getPreviousPlace(): ?PlaceInterface;
}
