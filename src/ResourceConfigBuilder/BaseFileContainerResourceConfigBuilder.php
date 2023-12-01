<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\FileContainerInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,FileContainerInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $entityId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $entityClass
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $entityField
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $createDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $modifyDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $order
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $fileString
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,FileContainerInterface,FileInterface> $file
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,FileContainerInterface> $publicAllowed
 */
class BaseFileContainerResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
