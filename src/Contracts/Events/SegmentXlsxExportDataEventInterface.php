<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;

/**
 * Dispatched once per segment during the XLSX export data build.
 * Subscribers may enrich the export data array, e.g. by adding topicalTagNames
 * and nonTopicalTagNames keys.
 * Without any subscriber the export data remains unchanged.
 */
interface SegmentXlsxExportDataEventInterface
{
    public function getSegment(): SegmentInterface;

    public function getExportData(): array;

    public function setExportData(array $exportData): void;
}
