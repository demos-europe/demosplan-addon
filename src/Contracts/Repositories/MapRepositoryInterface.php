<?php

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;

use DemosEurope\DemosplanAddon\Contracts\Entities\GisLayerInterface;
use demosplan\DemosPlanCoreBundle\Entity\Map\GisLayer;
use Exception;

interface MapRepositoryInterface
{
    /**
     * Delete a single Gislayer form the DB.
     * If the given ID related to a global GisLayer, all Entries which uses this global-ID will be also deleted.     *
     *
     * @var string $gisLayerId
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete($gisLayerId);


    /**
     * Set the values of "order" according to the order of the given array.
     * Entries there are existing in the table, but are not in the given array, will be ignored.
     *
     * @param array $gisLayerIds array of IDs of gisLayer, in the required order
     *
     * @return bool true, if all given IDs were successful reordered, otherwise false
     *
     * @throws Exception
     */
    public function reOrderGisLayers($gisLayerIds): bool;


    /**
     * @param GisLayerInterface $gisLayer
     *
     * @return GisLayerInterface
     *
     * @throws Exception
     */
    public function updateObject($gisLayer);

}
