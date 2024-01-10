<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Utilities;

class AddonPath
{
    public static function getRootPath($path = ''): string
    {
        return dirname(__FILE__, 6).DIRECTORY_SEPARATOR.$path;
    }
}
