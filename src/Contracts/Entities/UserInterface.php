<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface UserInterface extends UuidEntityInterface
{
    public function getOrga(): ?OrgaInterface;
}
