<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\AddressBookEntryInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\AddressInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\BrandingInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\DepartmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\InstitutionTagInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\MasterToebInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaStatusInCustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SlugInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $name
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $gatewayName
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $code
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $createdDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $modifiedDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $ccEmail2
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $emailReviewerAdmin
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $deleted
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $showname
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $showlist
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $gwId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $competence
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $email2
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $contactPerson
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $paperCopy
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $paperCopySpec
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,AddressInterface> $addresses
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $dataProtection
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,OrgaInterface> $imprint
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,UserInterface> $users
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,DepartmentInterface> $departments
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,ProcedureInterface> $procedures
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,ProcedureInterface> $procedureInvitations
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,AddressBookEntryInterface> $addressBookEntries
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,OrgaStatusInCustomerInterface> $statusInCustomers
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,MasterToebInterface> $masterToeb
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,BrandingInterface> $branding
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,ProcedureInterface> $administratableProcedures
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,InstitutionTagInterface> $assignedTags
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,SlugInterface> $currentSlug
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,OrgaInterface,SlugInterface> $slugs
 */
class BaseOrgaResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
