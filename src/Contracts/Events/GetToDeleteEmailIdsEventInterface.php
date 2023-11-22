<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface GetToDeleteEmailIdsEventInterface
{
    public function getToDeleteEmailIds(): array;

    public function setToDeleteEmailIds(array $emailIds): void;
}
