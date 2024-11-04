<?php

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\PropertyAutoPathInterface;

/**
 * @template-extends ResourceTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, OrgaInterface>
 */
interface OrgaResourceTypeInterface extends PropertyAutoPathInterface, ResourceTypeInterface
{

}