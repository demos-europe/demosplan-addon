<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

interface AddressBookEntryInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function getName(): ?string;

    /**
     * @param string|null $name
     */
    public function setName($name);

    public function getEmailAddress(): string;

    public function setEmailAddress(string $emailAddress);

    /**
     * @return DateTime|DateTimeImmutable
     */
    public function getCreatedDate(): DateTimeInterface;

    /**
     * @param DateTime|DateTimeImmutable $createdDate
     */
    public function setCreatedDate(DateTimeInterface $createdDate);

    /**
     * @return DateTime|DateTimeImmutable
     */
    public function getModifiedDate(): DateTimeInterface;

    public function getOrganisation(): OrgaInterface;

    public function setOrganisation(OrgaInterface $organisation);
}
