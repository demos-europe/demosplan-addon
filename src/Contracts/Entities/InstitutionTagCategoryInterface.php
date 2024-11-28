<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface InstitutionTagCategoryInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function getId(): ?string;
    public function getCreationDate(): DateTime;
    public function getModificationDate(): DateTime;
    public function getName(): string;
    public function setName(string $name): void;
    public function setCustomer(CustomerInterface $customer): void;
}
