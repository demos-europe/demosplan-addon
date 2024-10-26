<?php

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateCategoryInterface;

interface BoilerplateCategoryFactoryInterface
{
    public function createBoilerplateCategory(): BoilerplateCategoryInterface;
}