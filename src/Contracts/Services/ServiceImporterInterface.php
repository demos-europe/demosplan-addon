<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use Exception;

interface ServiceImporterInterface
{
    /**
     * Uploads a single File.
     *
     * @param string $elementId
     * @param string $procedureId
     *
     * @throws Exception
     */
    public function uploadImportFile($elementId, $procedureId, $uploadedFile): void;
}
