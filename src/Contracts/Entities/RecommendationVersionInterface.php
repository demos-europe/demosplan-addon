<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface RecommendationVersionInterface
{
    /**
     * Returns the version ID.
     *
     * Note: the collection returned by {@see StatementInterface::getRecommendationVersions()}
     * includes a virtual "current" version whose ID follows the pattern 'virtual-{statementId}'
     * instead of a real UUID. Consumers should account for this when processing IDs.
     */
    public function getId(): ?string;

    public function getStatement(): StatementInterface;

    public function getVersionNumber(): int;

    public function getRecommendationText(): string;

    public function getCreatedAt(): ?DateTime;
}
