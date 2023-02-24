<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

interface GisLayerFactoryInterface
{
    public function createGisLayer(): GisLayerInterface;
}
