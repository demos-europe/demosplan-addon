<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ForumEntryInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ForumThreadInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ForumEntryInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumEntryInterface> $ident
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ForumEntryInterface,ForumThreadInterface> $thread
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ForumEntryInterface,UserInterface> $user
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumEntryInterface> $userRoles
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumEntryInterface> $text
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumEntryInterface> $initialEntry
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumEntryInterface> $createDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ForumEntryInterface> $modifyDate
 */
class BaseForumEntryResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
