<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

interface InitializeServiceInterface
{
    public function initialize(array $context): void;
}
