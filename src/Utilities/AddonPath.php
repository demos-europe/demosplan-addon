<?php

namespace DemosEurope\DemosplanAddon\Utilities;

class AddonPath
{
    public static function getRootPath($path = ''): string
    {
        return dirname(__FILE__, 6).DIRECTORY_SEPARATOR.$path;
    }
}
