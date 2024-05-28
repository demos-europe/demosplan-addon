<?php

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateInterface;

interface BoilerplateFactoryInterface
{
    public function createBoilerplate(): BoilerplateInterface;
}