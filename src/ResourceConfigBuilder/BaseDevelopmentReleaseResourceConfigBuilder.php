<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\DevelopmentReleaseInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,DevelopmentReleaseInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $ident
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $description
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $title
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $phase
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $startDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $endDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $modifiedDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,DevelopmentReleaseInterface> $createDate
 */
class BaseDevelopmentReleaseResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
