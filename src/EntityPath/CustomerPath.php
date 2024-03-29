<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @property-read End $id
 * @property-read CustomerCountyPath $customerCounties
 * @property-read End $imprint
 * @property-read UserRoleInCustomerPath $userRoles
 * @property-read OrgaStatusInCustomerPath $orgaStatuses
 * @property-read End $dataProtection
 * @property-read End $termsOfUse
 * @property-read End $xplanning
 * @property-read ProcedurePath $defaultProcedureBlueprint
 * @property-read End $mapAttribution
 * @property-read End $baseLayerUrl
 * @property-read End $baseLayerLayers
 * @property-read BrandingPath $branding
 * @property-read End $accessibilityExplanation
 * @property-read VideoPath $signLanguageOverviewVideos
 * @property-read End $signLanguageOverviewDescription
 * @property-read End $overviewDescriptionInSimpleLanguage
 * @property-read SupportContactPath $contacts
 * @property-read End $name
 * @property-read End $subdomain
 */
class CustomerPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
