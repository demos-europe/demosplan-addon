<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

interface PdfNameServiceInterface
{
    /**
     * Generiere den Downloadfilename aus dem übergebenen Dateinamen
     * Der IE braucht eine Extrabehandlung.
     *
     * @param string $filename
     *
     * @return string
     */
    public function generateDownloadFilename($filename);
}
