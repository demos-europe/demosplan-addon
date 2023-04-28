<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface SlugInterface extends UuidEntityInterface
{
    public function setId(string $id);

    public function getName(): string;

    public function setName(string $name);
}
