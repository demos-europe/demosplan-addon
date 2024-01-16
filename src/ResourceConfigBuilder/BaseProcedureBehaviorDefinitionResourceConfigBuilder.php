<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureBehaviorDefinitionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureTypeInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ProcedureBehaviorDefinitionInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedureBehaviorDefinitionInterface> $creationDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedureBehaviorDefinitionInterface> $modificationDate
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ProcedureBehaviorDefinitionInterface,ProcedureInterface> $procedure
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ProcedureBehaviorDefinitionInterface,ProcedureTypeInterface> $procedureType
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedureBehaviorDefinitionInterface> $allowedToEnableMap
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedureBehaviorDefinitionInterface> $hasPriorityArea
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedureBehaviorDefinitionInterface> $participationGuestOnly
 */
class BaseProcedureBehaviorDefinitionResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
