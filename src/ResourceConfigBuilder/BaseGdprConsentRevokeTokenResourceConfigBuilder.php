<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\EmailAddressInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\GdprConsentRevokeTokenInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GdprConsentRevokeTokenInterface>
 *
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GdprConsentRevokeTokenInterface,StatementInterface> $statements
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GdprConsentRevokeTokenInterface> $token
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GdprConsentRevokeTokenInterface,EmailAddressInterface> $emailAddress
 */
class BaseGdprConsentRevokeTokenResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
