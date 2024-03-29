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
 * @property-read End $userIdent
 * @property-read End $userName
 * @property-read End $sessionIdent
 * @property-read End $name
 * @property-read End $type
 * @property-read End $value
 * @property-read End $created
 * @property-read StatementPath $statement
 */
class StatementVersionFieldPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
