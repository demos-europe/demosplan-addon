<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

interface ApiPaginationInterface
{
    public function getSize(): int;
    public function getNumber(): int;
    public function getSortBy(): string;
    public function getSortDirection(): string;
    public function setSize(int $size): self;
    public function setNumber(int $number): self;
    public function setSortBy(string $sortBy): self;
    public function setSortDirection(string $sortDirection): self;

    /**
     * @param string $sortString
     *
     * @deprecated sorting should be handled independent of pagination, use {@link JsonApiSortingParser}
     */
    public function setSortString($sortString = '');

    /**
     * @return array|null
     *
     * @deprecated sorting should be handled independent from pagination, use {@link JsonApiSortingParser}
     */
    public function getSort();
}
