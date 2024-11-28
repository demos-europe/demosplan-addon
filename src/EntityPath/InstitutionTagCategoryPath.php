<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;

/**
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @property-read End $id
 * @property-read End $name
 * @property-read CustomerPath $customer
 * @property-read InstitutionTagPath $tags
 */
class InstitutionTagCategoryPath implements PropertyAutoPathInterface
{
    use PropertyAutoPathTrait;
}
