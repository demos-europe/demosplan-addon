<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface SurveyVoteInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const PUBLICATION_PENDING = 'publication_pending';
    public const PUBLICATION_REJECTED = 'publication_rejected';
    public const PUBLICATION_APPROVED = 'publication_approved';

    public function isAgreed(): bool;

    public function getText(): string;

    public function getTextReview(): string;

    public function setTextReview(string $textReview): void;

    /**
     * Has text and the text is approved.
     */
    public function hasApprovedText(): bool;

    /**
     * A review is required if a) it has not yet happened and b) there is a text to review.
     */
    public function isReviewRequired(): bool;

    public function hasText(): bool;

    public function getCreatedDate(): DateTime;

    public function getSurvey(): SurveyInterface;

    public function getUser(): UserInterface;

    public static function getTextReviewAllowedValues(): array;
}