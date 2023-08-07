<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\UuidEntityInterface;
use EDT\Wrapping\Contracts\Types\NamedTypeInterface;

interface AfterResourceCreationEventInterface
{
    public function getTargetEntity(): UuidEntityInterface;

    public function getResourceType(): NamedTypeInterface;
}
