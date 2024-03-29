<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ForumThreadInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ForumThreadInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $ident
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $url
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $closed
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $closingReason
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $progression
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $createDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumThreadInterface> $modifyDate
 */
class BaseForumThreadResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
