<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use DateTimeInterface;

interface AddressInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function setCode(?string $code): self;

    public function getCode(): ?string;

    public function setStreet(?string $street): self;

    public function getStreet(): string;

    public function setStreet1(?string $street1): self;

    public function getStreet1(): ?string;

    public function setPostalcode(?string $postalcode): self;

    public function getPostalcode(): string;

    public function setCity(?string $city): self;

    public function getCity(): string;

    public function setRegion(?string $region): self;

    public function getRegion(): ?string;

    public function setState(?string $state): self;

    public function getState(): ?string;

    public function setPostofficebox(?string $postofficebox): self;

    public function getPostofficebox(): ?string;

    public function setPhone(?string $phone): self;

    public function getPhone(): ?string;

    public function setFax(?string $fax): self;

    public function getFax(): ?string;

    public function setEmail(?string $email): self;

    public function getEmail(): ?string;

    public function setUrl(?string $url): self;

    public function getUrl(): ?string;

    public function setCreatedDate(DateTimeInterface $createdDate): self;

    public function getCreatedDate(): DateTime;

    public function setModifiedDate(DateTimeInterface $modifiedDate): self;

    public function getModifiedDate(): DateTime;

    public function setDeleted(bool $deleted): self;

    public function getDeleted(): bool;

    public function getHouseNumber(): string;

    public function setHouseNumber(string $houseNumber): void;
}
