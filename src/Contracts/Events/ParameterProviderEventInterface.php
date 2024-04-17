<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface ParameterProviderEventInterface
{
    public function getView(): string;

    public function getParameters(): array;

    public function setParameters(array $parameters);

}
