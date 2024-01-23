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
 * @property-read End $type
 * @property-read End $title
 * @property-read End $description
 * @property-read End $text
 * @property-read End $picture
 * @property-read End $pictitle
 * @property-read End $pdf
 * @property-read End $pdftitle
 * @property-read End $enabled
 * @property-read End $deleted
 * @property-read End $createDate
 * @property-read End $modifyDate
 * @property-read End $deleteDate
 * @property-read RolePath $roles
 * @property-read CategoryPath $categories
 */
class GlobalContentPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
