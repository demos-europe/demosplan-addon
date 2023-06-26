<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface PostProcedureDeletedEventInterface
{
    /**
     * @return array<string, mixed>
     */
    public function getProcedureData(): array;
}
