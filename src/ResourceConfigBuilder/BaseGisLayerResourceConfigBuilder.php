<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ContextualHelpInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\GisLayerCategoryInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\GisLayerInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToOneRelationshipConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GisLayerInterface>
 *
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $ident
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $bplan
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $defaultVisibility
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $deleted
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $legend
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $layers
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $name
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $opacity
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $order
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $projectionLabel
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $projectionValue
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $procedureId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $print
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $scope
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $scope1
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $type
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $serviceType
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $capabilities
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $tileMatrixSet
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $url
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $enabled
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $gId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $layerVersion
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $xplan
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $createDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $modifyDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $deleteDate
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GisLayerInterface,ContextualHelpInterface> $contextualHelp
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,GisLayerInterface,GisLayerCategoryInterface> $category
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $treeOrder
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $userToggleVisibility
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $visibilityGroupId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,GisLayerInterface> $isMiniMap
 */
class BaseGisLayerResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
