<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface UuidEntityInterface extends EntityInterface
{
    public function getId(): ?string;
}
