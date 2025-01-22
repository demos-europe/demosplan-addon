<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface DeleteTagEventInterface
{
    public function getTagId(): string;

    public function hasBeenHandledSuccessfully(): bool;

    public function setHandledSuccessfully(bool $handledSuccessfully): void;
}
