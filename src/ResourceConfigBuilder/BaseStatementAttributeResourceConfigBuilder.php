<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\DraftStatementInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementAttributeInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementAttributeInterface>
 *
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementAttributeInterface,StatementInterface> $statement
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementAttributeInterface,DraftStatementInterface> $draftStatement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementAttributeInterface> $type
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementAttributeInterface> $value
 */
class BaseStatementAttributeResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
