<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\ResourceType\JsonApiResourceTypeInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\Querying\Pagination\PagePagination;

interface JsonApiEsServiceInterface
{
    public const FIELDS_TO_SEARCH = 'fieldsToSearch';
    public const FACET_KEYS = 'facetKeys';
    public const VALUE = 'value';
    public const SEARCH = 'search';

    /**
     * @param array<int, string> $prefilteredIdentifiers
     * @param array<int,non-empty-string> $fieldsToSearch
     * @param list<OrderBySortMethodInterface> $sortMethods
     */
    public function optimisticallyGetEsFilteredObjects(
        JsonApiResourceTypeInterface $type,
        array $prefilteredIdentifiers,
        string $searchValue,
        ?array $fieldsToSearch,
        array $sortMethods,
        ?PagePagination $pagination
    ): ApiListResultInterface;
}
