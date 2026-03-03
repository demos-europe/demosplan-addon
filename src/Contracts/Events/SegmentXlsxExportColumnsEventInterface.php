<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

/**
 * Dispatched once before the segment XLSX export is built.
 * Subscribers may replace or extend the column definitions array.
 * Without any subscriber the default tagNames/topicNames columns remain unchanged.
 */
interface SegmentXlsxExportColumnsEventInterface
{
    public function getColumnsDefinition(): array;

    public function setColumnsDefinition(array $columnsDefinition): void;
}
