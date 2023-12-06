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
 * @property-read End $entryId
 * @property-read ForumEntryPath $entry
 * @property-read End $createDate
 * @property-read End $modifyDate
 * @property-read End $deleted
 * @property-read End $blocked
 * @property-read End $order
 * @property-read End $string
 * @property-read End $hash
 */
class ForumEntryFilePath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}