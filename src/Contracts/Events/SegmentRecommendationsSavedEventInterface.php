<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

/**
 * Dispatched after a bulk recommendation edit has been persisted. The recommendation text is
 * written via a raw DQL update for performance, so the segments returned by {@see getSegments()}
 * still carry their pre-edit recommendation in memory; use {@see getRecommendationText()} for the
 * text that was actually saved.
 */
interface SegmentRecommendationsSavedEventInterface
{
    /**
     * @return array<int, SegmentInterface>
     */
    public function getSegments(): array;

    public function getRecommendationText(): string;

    /**
     * When true, each segment's actually saved text is its own pre-edit
     * {@see SegmentInterface::getRecommendation()} (still available via {@see getSegments()}, since
     * that value reflects the state before this edit) concatenated, in that order, with
     * {@see getRecommendationText()}. When false, every segment's saved text is
     * {@see getRecommendationText()} verbatim.
     */
    public function isAttached(): bool;

    public function getUser(): UserInterface;
}
