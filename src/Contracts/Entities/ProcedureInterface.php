<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;

interface ProcedureInterface extends EntityInterface
{
    /**
     * @return Collection<int,ElementsInterface>
     */
    public function getElements(): Collection;
}
