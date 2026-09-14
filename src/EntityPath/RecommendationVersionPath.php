<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;

/**
 * @property-read End $id
 * @property-read End $versionNumber
 * @property-read End $recommendationText
 * @property-read End $createdAt
 * @property-read StatementPath $statement
 */
class RecommendationVersionPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
