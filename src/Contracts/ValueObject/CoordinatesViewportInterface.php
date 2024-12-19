<?php
declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ValueObject;


/**
 * Coordinates may be stored only in EPSG:3857 Pseudo Mercator.
 *
 * @method float getLeft()
 * @method float getBottom()
 * @method float getRight()
 * @method float getTop()
 */
interface CoordinatesViewportInterface
{
    /**
     * @return float[]
     */
    public function toArray(): array;
}
