<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface GetTopicalTagRelationEventInterface
{
    public function getTagIdToProvideIsTopicalFor(): string;

    public function setTagIdToProvideIsTopicalFor(string $tagIdToProvideIsTopicalFor): void;

    public function getIsTopicalResult(): bool;

    public function setIsTopical(bool $isTopical): void;
}
