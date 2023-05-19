<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface PlaceInterface
{
    public function getName(): string;

    public function setName(string $name): self;

    public function setSortIndex(int $sortIndex): self;

    public function getSortIndex(): int;

    public function getProcedure(): ProcedureInterface;

    public function getDescription(): string;

    public function setDescription(string $description);

}