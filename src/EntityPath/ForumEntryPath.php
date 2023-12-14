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
 * @property-read ForumThreadPath $thread
 * @property-read UserPath $user
 * @property-read End $userRoles
 * @property-read End $text
 * @property-read End $initialEntry
 * @property-read End $createDate
 * @property-read End $modifyDate
 */
class ForumEntryPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}