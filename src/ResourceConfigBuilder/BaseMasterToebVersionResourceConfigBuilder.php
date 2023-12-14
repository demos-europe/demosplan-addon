<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\DepartmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\MasterToebInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\MasterToebVersionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,MasterToebVersionInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $ident
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,MasterToebVersionInterface,MasterToebInterface> $masterToeb
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $gatewayGroup
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $orgaName
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,MasterToebVersionInterface,OrgaInterface> $orga
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,MasterToebVersionInterface,DepartmentInterface> $department
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $departmentName
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $sign
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $email
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $ccEmail
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $contactPerson
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $memo
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $comment
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $registered
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtHHMitte
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtEimsbuettel
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtAltona
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtHHNord
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtWandsbek
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtBergedorf
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtHarburg
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $districtBsu
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $documentRoughAgreement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $documentAgreement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $documentNotice
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $documentAssessment
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $createdDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $modifiedDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,MasterToebVersionInterface> $versionDate
 */
class BaseMasterToebVersionResourceConfigBuilder extends MagicResourceConfigBuilder
{
}