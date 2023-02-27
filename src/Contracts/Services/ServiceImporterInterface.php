<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use Exception;

interface ServiceImporterInterface
{
    /**
     * Uploads a single File.
     *
     * @throws Exception
     */
    public function uploadImportFile(string $elementId,string $procedureId, $uploadedFile): void;
}
