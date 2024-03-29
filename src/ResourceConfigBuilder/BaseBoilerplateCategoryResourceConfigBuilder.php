<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateCategoryInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,BoilerplateCategoryInterface>
 *
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,BoilerplateCategoryInterface,ProcedureInterface> $procedure
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,BoilerplateCategoryInterface,BoilerplateInterface> $boilerplates
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,BoilerplateCategoryInterface> $title
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,BoilerplateCategoryInterface> $description
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,BoilerplateCategoryInterface> $createDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,BoilerplateCategoryInterface> $modifyDate
 */
class BaseBoilerplateCategoryResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
