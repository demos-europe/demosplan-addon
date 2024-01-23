<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\BrandingInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\FileInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToOneRelationshipConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,BrandingInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,BrandingInterface> $cssvars
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,BrandingInterface,FileInterface> $logo
 */
class BaseBrandingResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
