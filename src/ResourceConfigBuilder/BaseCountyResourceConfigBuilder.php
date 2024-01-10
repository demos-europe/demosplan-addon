<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\CountyInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerCountyInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementFragmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToManyRelationshipConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CountyInterface>
 *
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CountyInterface,CustomerCountyInterface> $customerCounties
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CountyInterface> $name
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CountyInterface,StatementInterface> $statements
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CountyInterface,StatementFragmentInterface> $statementFragments
 */
class BaseCountyResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
