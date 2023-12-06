<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use DemosEurope\DemosplanAddon\EntityPath\ElementsPath as ElementsPath1;
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
 * @property-read End $elementParentId
 * @property-read ElementsPath $parent
 * @property-read End $pId
 * @property-read ProcedurePath $procedure
 * @property-read End $category
 * @property-read End $title
 * @property-read End $icon
 * @property-read End $iconTitle
 * @property-read End $text
 * @property-read End $file
 * @property-read End $order
 * @property-read End $enabled
 * @property-read End $deleted
 * @property-read End $createDate
 * @property-read End $modifyDate
 * @property-read End $deleteDate
 * @property-read SingleDocumentPath $documents
 * @property-read ElementsPath $children
 * @property-read OrgaPath $organisations
 * @property-read End $designatedSwitchDate
 * @property-read End $permission
 */
class ElementsPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}