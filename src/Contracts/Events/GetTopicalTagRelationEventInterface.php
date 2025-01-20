<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface GetTopicalTagRelationEventInterface
{
    /**
     * @return array<int, string> list of tag ids to provide isTopicalFor
     */
    public function getTagIdsToProvideIsTopicalFor(): array;

    /**
     * @var array<string, bool> $tagIdsToProvideIsTopicalFor <tagId, isTopical>
     */
    public function setTagIdsToProvideIsTopicalFor(array $tagIdsToProvideIsTopicalFor): void;

    /**
     * @return array<string, bool> <tagId, isTopical>
     */
    public function getTagIdsToIsTopicalMap(): array;
}