<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\ResourceType\JsonApiResourceTypeInterface;
use EDT\Querying\Pagination\PagePagination;

interface JsonApiEsServiceInterface
{
    public function optimisticallyGetEsFilteredObjects(
        JsonApiResourceTypeInterface $type,
        array $prefilteredIdentifiers,
        array $rawSearchParams,
        array $sortMethods,
        ?PagePagination $pagination
    ): ApiListResultInterface;
}
