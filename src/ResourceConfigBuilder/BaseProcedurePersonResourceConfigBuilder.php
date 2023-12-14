<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedurePersonInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToManyRelationshipConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToOneRelationshipConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ProcedurePersonInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedurePersonInterface> $streetName
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedurePersonInterface> $streetNumber
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedurePersonInterface> $city
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedurePersonInterface> $postalCode
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedurePersonInterface> $emailAddress
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ProcedurePersonInterface,StatementInterface> $similarForeignStatements
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ProcedurePersonInterface> $fullName
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ProcedurePersonInterface,ProcedureInterface> $procedure
 */
class BaseProcedurePersonResourceConfigBuilder extends MagicResourceConfigBuilder
{
}