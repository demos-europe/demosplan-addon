<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\FloodInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,FloodInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FloodInterface> $event
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FloodInterface> $identifier
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FloodInterface> $created
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FloodInterface> $expires
 */
class BaseFloodResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
