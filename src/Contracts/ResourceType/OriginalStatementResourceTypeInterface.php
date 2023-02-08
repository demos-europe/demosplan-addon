<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\PropertyAutoPathInterface;

interface OriginalStatementResourceTypeInterface extends PropertyAutoPathInterface, ResourceTypeInterface
{

}
