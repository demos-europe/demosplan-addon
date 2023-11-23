<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface GetEmailIdsEventInterface
{
    public function getEmailIds(): array;

    public function setEmailIds(array $emailIds): void;
}
