<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\GdprConsentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GdprConsentInterface>
 *
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GdprConsentInterface,StatementInterface> $statement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GdprConsentInterface> $consentReceived
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GdprConsentInterface> $consentReceivedDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GdprConsentInterface> $consentRevoked
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GdprConsentInterface> $consentRevokedDate
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GdprConsentInterface,UserInterface> $consentee
 */
class BaseGdprConsentResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
