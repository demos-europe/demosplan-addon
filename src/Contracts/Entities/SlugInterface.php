<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface SlugInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function setId(string $id);

    public function getName(): string;

    public function setName(string $name);
}
