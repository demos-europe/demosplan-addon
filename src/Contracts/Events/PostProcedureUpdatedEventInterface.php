<?php
declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Contracts\Events;


use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface PostProcedureUpdatedEventInterface
{
    public function getProcedureBeforeUpdate(): ProcedureInterface;
    public function getProcedureAfterUpdate(): ProcedureInterface;
    public function getModifiedValues(): array;
}
