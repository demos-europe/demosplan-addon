<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
interface ProcedurePersonInterface extends UuidEntityInterface
{
    public function getProcedure(): ProcedureInterface;

    public function getFullName(): ?string;

    public function setFullName(?string $fullName): ProcedurePersonInterface;

    public function getStreetName(): ?string;

    public function setStreetName(?string $streetName): ProcedurePersonInterface;

    public function getStreetNumber(): ?string;

    public function setStreetNumber(?string $streetNumber): ProcedurePersonInterface;

    public function getCity(): ?string;

    public function setCity(?string $city): ProcedurePersonInterface;

    public function getPostalCode(): ?string;

    public function setPostalCode(?string $postalCode): ProcedurePersonInterface;

    public function setEmailAddress(?string $emailAddress): ProcedurePersonInterface;

    public function getEmailAddress(): ?string;

    public function getSimilarForeignStatements(): Collection;

    public function addSimilarForeignStatement(StatementInterface $similarForeignStatement): void;

    public function removeSimilarForeignStatement(StatementInterface $similarForeignStatement): void;
}