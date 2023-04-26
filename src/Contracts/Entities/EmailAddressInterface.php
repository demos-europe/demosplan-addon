<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface EmailAddressInterface extends CoreEntityInterface, UuidEntityInterface
{
    public function setId(string $id): void;

    /**
     * The full email address containing the local part and domain name.
     * Not the so-called display name.
     **/
    public function getFullAddress(): string;

    /**
    * The full email address containing the local part and domain name.
    * Not the so-called display name.
    **/
    public function setFullAddress(string $fullAddress);
}
