<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

use DemosEurope\DemosplanAddon\Contracts\ValueObject\PdfFileInterface;

interface PdfFileFactoryInterface
{
    public function createPdfFile(string $name, string $content): PdfFileInterface;
}
