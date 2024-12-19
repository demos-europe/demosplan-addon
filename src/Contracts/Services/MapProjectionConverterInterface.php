<?php
declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\ValueObject\CoordinatesViewportInterface;
use proj4php\Proj;

interface MapProjectionConverterInterface
{
    public const OBJECT_RETURN_TYPE = 'object';
    public const ARRAY_RETURN_TYPE = 'array';
    public const STRING_RETURN_TYPE = 'string';

    /**
     * Transforms the projection for geometries (points, lines, polygons...) inside a string
     * in geojson format.
     *
     * @param string $returnType [self::OBJECT_RETURN_TYPE | self::STRING_RETURN_TYPE]
     */
    public function convertGeoJsonPolygon(string $geoJson, Proj $currentProjection, Proj $newProjection, string $returnType = self::OBJECT_RETURN_TYPE): object|string;

    /**
     * Transforms the projection for a pair of coordinates defining a rectangle
     * (Ex: '123.456,789.012,345.678,901.234').
     *
     * @param string $returnType [self::ARRAY_RETURN_TYPE | self::STRING_RETURN_TYPE]
     */
    public function convertViewport(string $viewport, Proj $currentProjection, Proj $newProjection, string $returnType = self::ARRAY_RETURN_TYPE): array|string;

    public function convertCoordinatesViewport(CoordinatesViewportInterface $coordinatesViewport, string $sourceProjectionString, string $targetProjectionString): CoordinatesViewport;

    public function convertCoordinate(string $coordinate, Proj $currentProjection, Proj $newProjection, string $returnType = self::ARRAY_RETURN_TYPE);

    /**
     * @param string $returnType [self::ARRAY_RETURN_TYPE | self::STRING_RETURN_TYPE]
     */
    public function convertPoint(array $coordinate, Proj $currentProjection, Proj $newProjection, string $returnType = self::ARRAY_RETURN_TYPE): array|string;

    public function getProjection(string $sourceProjectionName): Proj;
}
