<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ValueObject;

interface PdfFileInterface
{
    public function toArray(): array;
}
