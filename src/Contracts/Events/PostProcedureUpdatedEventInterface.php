<?php
declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Contracts\Events;


use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface PostProcedureUpdatedEventInterface
{
    public function getProcedure(): ProcedureInterface;
}
