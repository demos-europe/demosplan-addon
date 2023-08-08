<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends DoctrineResourceType<TEntity>
 */
abstract class AddonResourceType extends DoctrineResourceType
{
    public function __construct(
        InterfaceCapeableReflectionSegmentFactory $segmentFactory
    ) {
        parent::__construct();
        $this->segmentFactory = $segmentFactory;
    }
}
