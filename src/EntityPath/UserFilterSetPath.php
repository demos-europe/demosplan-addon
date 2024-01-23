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
 * @property-read UserPath $user
 * @property-read End $name
 * @property-read HashedQueryPath $filterSet
 * @property-read ProcedurePath $procedure
 */
class UserFilterSetPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
