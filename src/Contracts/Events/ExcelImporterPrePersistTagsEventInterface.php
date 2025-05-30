<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface ExcelImporterPrePersistTagsEventInterface
{
    public function getSegments(): array;

    public function getTags(): array;
}
