<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface ViewStatementStatusInterface extends CoreEntityInterface
{
    public function getStatement(): string;

    public function getStatus(): string;
}
