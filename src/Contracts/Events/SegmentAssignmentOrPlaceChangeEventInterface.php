<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\PlaceInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

/**
 * Dispatched after one or more segments' assignee and/or workflow place has actually changed,
 * single-segment or bulk. Each entry in {@see getSegments()} already reflects its new values;
 * {@see getPreviousAssignees()} and {@see getPreviousPlaces()} carry what each segment held
 * immediately before this change, keyed by segment id.
 */
interface SegmentAssignmentOrPlaceChangeEventInterface
{
    /**
     * @return array<int, SegmentInterface>
     */
    public function getSegments(): array;

    /**
     * @return array<string, ?UserInterface>
     */
    public function getPreviousAssignees(): array;

    /**
     * @return array<string, ?PlaceInterface>
     */
    public function getPreviousPlaces(): array;
}
