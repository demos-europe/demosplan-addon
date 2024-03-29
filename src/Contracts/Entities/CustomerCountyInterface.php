<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface CustomerCountyInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function setId(string $id): self;

    public function getCustomer(): CustomerInterface;

    public function setCustomer(CustomerInterface $customer): self;

    public function getCounty(): CountyInterface;

    public function setCounty(CountyInterface $county): self;

    public function getEmail(): string;

    public function setEmail(string $eMail): self;
}
