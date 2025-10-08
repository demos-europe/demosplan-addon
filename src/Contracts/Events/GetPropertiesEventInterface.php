<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceConfig\Builder\ResourceConfigBuilderInterface;
use EDT\Querying\Contracts\EntityBasedInterface;

/**
 * @template TEntity of EntityInterface
 */
interface GetPropertiesEventInterface
{
    /**
     * @return ResourceConfigBuilderInterface<TEntity>
     */
    public function getConfigBuilder(): ResourceConfigBuilderInterface;

    /**
     * @return EntityBasedInterface<TEntity>
     */
    public function getType(): EntityBasedInterface;
}
