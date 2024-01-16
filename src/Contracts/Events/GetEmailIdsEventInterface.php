<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface GetEmailIdsEventInterface
{
    /**
     * @return list<non-empty-string>
     */
    public function getEmailIds(): array;

    /**
     * @param list<non-empty-string> $emailIds
     */
    public function addEmailIds(array $emailIds): void;
}
