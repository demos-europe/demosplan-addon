<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\LocationInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,LocationInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,LocationInterface> $postcode
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,LocationInterface> $name
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,LocationInterface> $municipalCode
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,LocationInterface> $ars
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,LocationInterface> $lat
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,LocationInterface> $lon
 */
class BaseLocationResourceConfigBuilder extends MagicResourceConfigBuilder
{
}