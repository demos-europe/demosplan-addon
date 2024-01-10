<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use Pagerfanta\Pagerfanta;

interface ApiListResultInterface
{
    /**
     * @return array<int, EntityInterface>
     */
    public function getList(): array;

    public function getPaginator(): ?Pagerfanta;

    public function getMeta(): array;
}
