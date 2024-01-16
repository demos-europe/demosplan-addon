<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\BrandingInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerCountyInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaStatusInCustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SupportContactInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserRoleInCustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\VideoInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface>
 *
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,CustomerCountyInterface> $customerCounties
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $imprint
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,UserRoleInCustomerInterface> $userRoles
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,OrgaStatusInCustomerInterface> $orgaStatuses
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $dataProtection
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $termsOfUse
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $xplanning
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,ProcedureInterface> $defaultProcedureBlueprint
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $mapAttribution
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $baseLayerUrl
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $baseLayerLayers
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,BrandingInterface> $branding
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $accessibilityExplanation
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,VideoInterface> $signLanguageOverviewVideos
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $signLanguageOverviewDescription
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $overviewDescriptionInSimpleLanguage
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,CustomerInterface,SupportContactInterface> $contacts
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $name
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,CustomerInterface> $subdomain
 */
class BaseCustomerResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
