<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\TagInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;

/**
 * @template-extends ResourceTypeInterface<TagInterface>
 */
interface TagResourceTypeInterface extends PropertyAutoPathInterface, ResourceTypeInterface
{

}
