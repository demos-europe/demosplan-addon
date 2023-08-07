<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\Wrapping\Contracts\Types\NamedTypeInterface;

interface AfterResourceCreationEventInterface
{
    public function getTargetEntity(): EntityInterface;

    public function getResourceType(): NamedTypeInterface;
}
