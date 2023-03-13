<?php
declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Contracts\ValueObject;


interface PercentageDistributionInterface
{
    public function createInstance(int $total, array $absolutes): self;
}
