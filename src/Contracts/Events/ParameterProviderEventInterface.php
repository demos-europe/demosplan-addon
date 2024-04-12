<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface ParameterProviderEventInterface
{
    public function getView();

    public function getParameters();

    public function setParameters(array $parameters);

}
