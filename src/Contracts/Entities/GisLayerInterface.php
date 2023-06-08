<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface GisLayerInterface extends UuidEntityInterface, CoreEntityInterface
{

    public const TYPE_BASE = 'base';
    public const TYPE_OVERLAY = 'overlay';

    public function set($data);

    /**
     * Wandle das Objekt in ein Array um.
     *
     * @return array
     */
    public function toArray();

    /**
     * @param string $ident
     */
    public function setIdent($ident);

    /**
     * @return bool
     */
    public function isBplan();

    /**
     * @param bool $bplan
     */
    public function setBplan($bplan);

    /**
     * @return bool
     */
    public function hasDefaultVisibility();

    /**
     * @param bool $defaultVisibility
     *
     * @return GisLayerInterface
     */
    public function setDefaultVisibility($defaultVisibility);

    /**
     * @return bool
     */
    public function isDeleted();

    /**
     * @param bool $deleted
     */
    public function setDeleted($deleted);

    /**
     * @return string
     */
    public function getLegend();

    /**
     * @param string $legend
     *
     * @return GisLayerInterface
     */
    public function setLegend($legend);

    /**
     * @return string
     */
    public function getLayers();

    /**
     * @param string $layers
     *
     * @return GisLayerInterface
     */
    public function setLayers($layers);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return GisLayerInterface
     */
    public function setName($name);

    /**
     * @return int
     */
    public function getOpacity();

    /**
     * @param int $opacity
     *
     * @return GisLayerInterface
     */
    public function setOpacity($opacity);

    /**
     * @return string
     */
    public function getProcedureId();

    /**
     * Alias, damit Twig auf pId zugreifen kann.
     *
     * @return string
     */
    public function getPId();

    /**
     * @param string $procedureId
     *
     * @return GisLayerInterface
     */
    public function setProcedureId($procedureId);

    /**
     * @return bool
     */
    public function isPrint();

    /**
     * @param bool $print
     */
    public function setPrint($print);

    /**
     * @return bool
     */
    public function isScope();

    /**
     * @param bool $scope
     */
    public function setScope($scope);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     *
     * @return GisLayerInterface
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getServiceType();

    /**
     * @param string $serviceType
     */
    public function setServiceType($serviceType);

    /**
     * @return string
     */
    public function getCapabilities();

    /**
     * @param string $capabilities
     */
    public function setCapabilities($capabilities);

    /**
     * @return string
     */
    public function getTileMatrixSet();

    /**
     * @param string $tileMatrixSet
     */
    public function setTileMatrixSet($tileMatrixSet);

    /**
     * @param bool $editMode Editiermodus, wird in HH benötigt
     *
     * @return string
     */
    public function getUrl($editMode = false);

    /**
     * @param string $url
     *
     * @return GisLayerInterface
     */
    public function setUrl($url);

    /**
     * @return bool
     */
    public function isEnabled();

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled);

    /**
     * @return bool
     */
    public function isGlobalLayer();

    /**
     * @param bool $globalLayer
     */
    public function setGlobalLayer($globalLayer);

    /**
     * @return string
     */
    public function getGlobalLayerId();

    /**
     * @param string $globalLayerId
     */
    public function setGlobalLayerId($globalLayerId);

    /**
     * @return string
     */
    public function getGId();

    /**
     * @param string $gId
     */
    public function setGId($gId);

    /**
     * @return bool
     */
    public function isXplan();

    /**
     * @param bool $xplan
     *
     * @return GisLayerInterface
     */
    public function setXplan($xplan);

    /**
     * @return int
     */
    public function getOrder();

    /**
     * @param int $order
     *
     * @return GisLayerInterface
     */
    public function setOrder($order);

    /**
     * @return DateTime
     */
    public function getCreateDate();

    /**
     * @param DateTime $createDate
     *
     * @return GisLayerInterface
     */
    public function setCreateDate($createDate);

    /**
     * @return DateTime
     */
    public function getModifyDate();

    /**
     * @param DateTime $modifyDate
     *
     * @return GisLayerInterface
     */
    public function setModifyDate($modifyDate);

    /**
     * @return DateTime
     */
    public function getDeleteDate();

    /**
     * @param DateTime $deleteDate
     *
     * @return GisLayerInterface
     */
    public function setDeleteDate($deleteDate);

    /**
     * @return array
     */
    public function getGlobalGis();

    /**
     * @param array $globalGis
     */
    public function setGlobalGis($globalGis);

    public function getLayerVersion(): string;

    public function setLayerVersion(string $layerVersion): void;

    /**
     * @param ContextualHelpInterface $help
     *
     * @return GisLayerInterface
     */
    public function setContextualHelp($help);

    /**
     * @return ContextualHelpInterface
     */
    public function getContextualHelp();

    /**
     * @return GisLayerCategoryInterface|null
     */
    public function getCategory();

    public function setCategory(GisLayerCategoryInterface $category);

    /**
     * @return string
     */
    public function getCategoryId();

    /**
     * @return int
     */
    public function getTreeOrder();

    /**
     * @param int $treeOrder
     */
    public function setTreeOrder($treeOrder);

    /**
     * @return bool
     */
    public function canUserToggleVisibility();

    /**
     * @return bool
     */
    public function getUserToggleVisibility();

    /**
     * @param bool $userToggleVisibility
     */
    public function setUserToggleVisibility($userToggleVisibility);

    /**
     * @return string
     */
    public function getVisibilityGroupId();

    /**
     * @param string|null $visibilityGroupId
     */
    public function setVisibilityGroupId($visibilityGroupId);

    /**
     * @return bool
     */
    public function isBaseLayer();

    /**
     * @return bool
     */
    public function isMiniMap();

    /**
     * @param bool $isMiniMap
     */
    public function setIsMiniMap($isMiniMap);

    public function isOverlay(): bool;

    public function getProjectionLabel(): string;

    public function setProjectionLabel(string $projectionLabel): void;

    public function getProjectionValue(): string;

    public function setProjectionValue(string $projectionValue): void;
}
