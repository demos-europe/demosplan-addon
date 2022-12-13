<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class AnyApplies extends AbstractGroupCondition
{
    protected function getConjunction(): string
    {
        return 'OR';
    }
}
