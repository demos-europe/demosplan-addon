<?php

namespace DemosEurope\DemosplanAddon\Contracts\Tools;

use Symfony\Component\HttpFoundation\File\File;

interface DocxAddonImporterInterface
{
    public function importDocx(File $file, string $procedureId): array;
}