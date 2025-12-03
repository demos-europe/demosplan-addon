<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\PropertyAutoPathInterface;

/**
 * @template-extends ResourceTypeInterface<StatementInterface>
 */
interface OriginalStatementResourceTypeInterface extends PropertyAutoPathInterface, ResourceTypeInterface
{

}
