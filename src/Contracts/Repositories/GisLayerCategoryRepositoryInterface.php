<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;

use DemosEurope\DemosplanAddon\Contracts\Entities\GisLayerCategoryInterface;
use Exception;

interface GisLayerCategoryRepositoryInterface
{
    /**
     * @throws Exception
     */
    public function getRootLayerCategory(string $procedureId): ?GisLayerCategoryInterface;
}
