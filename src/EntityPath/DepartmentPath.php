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
 * @property-read End $name
 * @property-read End $code
 * @property-read End $createdDate
 * @property-read End $modifiedDate
 * @property-read End $deleted
 * @property-read End $gwId
 * @property-read OrgaPath $orgas
 * @property-read AddressPath $addresses
 * @property-read UserPath $users
 */
class DepartmentPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
