<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use DemosEurope\DemosplanAddon\EntityPath\GisLayerCategoryPath as GisLayerCategoryPath1;
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
 * @property-read End $name
 * @property-read End $createDate
 * @property-read End $modifyDate
 * @property-read GisLayerPath $gisLayers
 * @property-read GisLayerCategoryPath $parent
 * @property-read GisLayerCategoryPath $children
 * @property-read End $treeOrder
 * @property-read End $visible
 * @property-read End $layerWithChildrenHidden
 */
class GisLayerCategoryPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
