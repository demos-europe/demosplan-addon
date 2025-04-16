<?php

declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Contracts\Events;

use League\Csv\MapIterator;

interface ExcelImporterHandleImportedTagsRecordsEventInterface
{
    public function getColumnTitles(): array;

    public function getTags(): array;

    public function setTags(array $tags): void;

    public function getRecords(): MapIterator;

}
