<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

/**
 * Dispatched after a recommendation edit has been persisted, single-segment or bulk. The bulk
 * path writes the recommendation text via a raw DQL update for performance, so the segments
 * returned by {@see getSegments()} may still carry their pre-edit recommendation in memory —
 * use {@see getRecommendationText()} for the text that was actually saved, and
 * {@see getPreviousRecommendationTexts()} for what each segment held immediately before this
 * edit, rather than relying on the segment's own (possibly stale, possibly already-updated,
 * depending on which path dispatched this event) in-memory state.
 */
interface SegmentRecommendationsSavedEventInterface
{
    /**
     * @return array<int, SegmentInterface>
     */
    public function getSegments(): array;

    public function getRecommendationText(): string;

    /**
     * When true, each segment's actually saved text is its own entry from
     * {@see getPreviousRecommendationTexts()} concatenated, in that order, with
     * {@see getRecommendationText()}. When false, every segment's saved text is
     * {@see getRecommendationText()} verbatim.
     */
    public function isAttached(): bool;

    /**
     * What each segment's recommendation held immediately before this edit, keyed by segment id.
     *
     * @return array<string, string>
     */
    public function getPreviousRecommendationTexts(): array;

    public function getUser(): UserInterface;
}
