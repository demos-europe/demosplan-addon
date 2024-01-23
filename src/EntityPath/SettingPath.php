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
 * @property-read End $ident
 * @property-read ProcedurePath $procedure
 * @property-read UserPath $user
 * @property-read OrgaPath $orga
 * @property-read End $orgaId
 * @property-read End $key
 * @property-read End $content
 * @property-read End $created
 * @property-read End $modified
 */
class SettingPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
