<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface ExcelImporterHandleSegmentsEventInterface
{
    public function getSegments(): array;

    public function setSegments(array $segments): void;
}
