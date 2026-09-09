<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

/**
 * Dispatched after a segment export has been triggered. Covers the segment-based export
 * (single docx, grouped/"Synopse" docx, zip of separate docx per statement, xlsx); the
 * classic assessment-table export is a different, separate code path and not covered here.
 * The xlsx format currently offers no anonymization option at all, so for
 * {@see self::FORMAT_XLSX} all three censor getters will be false.
 */
interface StatementsExportedEventInterface
{
    public const FORMAT_DOCX = 'docx';
    public const FORMAT_DOCX_PER_STATEMENT = 'docx_per_statement';
    public const FORMAT_XLSX = 'xlsx';

    public function getProcedure(): ProcedureInterface;

    /**
     * @return array<int, StatementInterface>
     */
    public function getStatements(): array;

    public function getFormat(): string;

    public function isCitizenDataCensored(): bool;

    public function isInstitutionDataCensored(): bool;

    public function isObscured(): bool;
}
