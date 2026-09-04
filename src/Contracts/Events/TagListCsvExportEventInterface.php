<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

/**
 * Dispatched once after the tag list CSV export is built for a procedure.
 * Subscribers may extend the column definitions and the rendered rows, e.g.
 * to insert an additional column and fill it in per row.
 *
 * Each entry returned by getRows() has the shape:
 *   ['tag' => TagInterface, 'values' => array] - 'tag' is the source entity a
 *   subscriber can use to look up related data (e.g. by tag id), 'values' is
 *   the list of already-rendered cell values for that row, in column order.
 *
 * Without any subscriber the export remains unchanged.
 */
interface TagListCsvExportEventInterface
{
    public function getColumnsDefinition(): array;

    public function setColumnsDefinition(array $columnsDefinition): void;

    public function getRows(): array;

    public function setRows(array $rows): void;
}
