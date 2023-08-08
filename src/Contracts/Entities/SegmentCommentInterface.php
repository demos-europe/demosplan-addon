<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface SegmentCommentInterface extends UuidEntityInterface
{
    public function getSubmitter(): ?UserInterface;

    public function getPlace(): ?PlaceInterface;

    public function getCreationDate(): DateTime;

    public function getText(): string;
}
