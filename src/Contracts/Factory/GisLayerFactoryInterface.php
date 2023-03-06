<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

use DemosEurope\DemosplanAddon\Contracts\Entities\GisLayerInterface;

interface GisLayerFactoryInterface
{
    public function createGisLayer(): GisLayerInterface;
}
