<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use DemosEurope\DemosplanAddon\EntityPath\UserPath as UserPath1;
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
 * @property-read End $dmId
 * @property-read End $gender
 * @property-read End $title
 * @property-read End $firstname
 * @property-read End $lastname
 * @property-read End $email
 * @property-read End $login
 * @property-read End $password
 * @property-read End $alternativeLoginPassword
 * @property-read End $salt
 * @property-read End $language
 * @property-read End $createdDate
 * @property-read End $modifiedDate
 * @property-read End $lastLogin
 * @property-read End $deleted
 * @property-read End $gwId
 * @property-read End $flags
 * @property-read OrgaPath $orga
 * @property-read DepartmentPath $departments
 * @property-read UserRoleInCustomerPath $roleInCustomers
 * @property-read AddressPath $addresses
 * @property-read SurveyVotePath $surveyVotes
 * @property-read UserPath $twinUser
 * @property-read ProcedurePath $authorizedProcedures
 * @property-read End $providedByIdentityProvider
 */
class UserPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
