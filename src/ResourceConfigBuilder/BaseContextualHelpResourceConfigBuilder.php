<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ContextualHelpInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ContextualHelpInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ContextualHelpInterface> $ident
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ContextualHelpInterface> $key
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ContextualHelpInterface> $text
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ContextualHelpInterface> $createDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ContextualHelpInterface> $modifyDate
 */
class BaseContextualHelpResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
