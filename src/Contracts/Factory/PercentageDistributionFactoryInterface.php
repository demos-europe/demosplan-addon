<?php
declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Contracts\Factory;


use DemosEurope\DemosplanAddon\Contracts\ValueObject\PercentageDistributionInterface;

interface PercentageDistributionFactoryInterface
{
    public function createPercentageDistribution(int $total, array $absolutes): PercentageDistributionInterface;
}
