<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface PostProcedureDeletedEventInterface
{
    public function getProcedureId(): string;
}
