<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;

use DemosEurope\DemosplanAddon\Contracts\Entities\EmailAddressInterface;

interface EmailAddressRepositoryInterface
{
    public function getOrCreateEmailAddress(string $inputEmailAddressString): EmailAddressInterface;

    /**
     * @param string[] $inputEmailAddressStrings
     *
     * @return EmailAddressInterface[] emailAddress entities with the given $inputEmailAddressString as
     *                        keys in the array and stored as their fullAddresses
     */
    public function getOrCreateEmailAddresses(array $inputEmailAddressStrings): array;

    /**
     * Checks if any EmailAddress entities are not referenced anymore and if so deletes them.
     *
     * @return int the number of deletions
     */
    public function deleteOrphanEmailAddresses(array $toEmailIds): int;
}
