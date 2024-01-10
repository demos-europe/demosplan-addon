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
 * @property-read ProcedurePath $procedure
 * @property-read ElementsPath $element
 * @property-read End $category
 * @property-read End $order
 * @property-read End $title
 * @property-read End $text
 * @property-read End $symbol
 * @property-read End $document
 * @property-read End $statementEnabled
 * @property-read End $visible
 * @property-read End $deleted
 * @property-read End $createDate
 * @property-read End $modifyDate
 * @property-read End $deleteDate
 * @property-read SingleDocumentVersionPath $versions
 */
class SingleDocumentPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
