<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;

interface GisLayerCategoryInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return DateTime
     */
    public function getCreateDate();

    /**
     * @return DateTime
     */
    public function getModifyDate();

    /**
     * @return ArrayCollection
     */
    public function getGisLayers();

    /**
     * @param GisLayerInterface[] $gisLayers
     */
    public function setGisLayers(array $gisLayers);

    public function addLayer(GisLayerInterface $gisLayer): void;

    /**
     * @return int
     */
    public function getTreeOrder();

    /**
     * @param int $treeOrder
     */
    public function setTreeOrder($treeOrder);

    /**
     * @return GisLayerCategoryInterface
     */
    public function getParent();

    /**
     * @return string|null
     */
    public function getParentId();

    /**
     * @throws Exception
     *
     * @param GisLayerCategoryInterface $newParent
     */
    public function setParent($newParent);

    /**
     * @return ArrayCollection
     */
    public function getChildren();

    /**
     * @throws Exception
     *
     * @param GisLayerCategoryInterface[] $children
     */
    public function setChildren($children);

    /**
     * @return bool
     */
    public function isVisible();

    /**
     * @param bool $visible
     */
    public function setVisible($visible);

    /**
     * @return bool
     */
    public function isRoot();

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate);

    /**
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate);

    /**
     * @return bool
     */
    public function isLayerWithChildrenHidden();

    /**
     * @param bool $layerWithChildrenHidden
     */
    public function setLayerWithChildrenHidden($layerWithChildrenHidden);
}
