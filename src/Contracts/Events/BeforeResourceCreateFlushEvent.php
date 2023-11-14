<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\ResourceType\DoctrineResourceType;

class BeforeResourceCreateFlushEvent
{
    /**
     * @template T of EntityInterface
     *
     * @param DoctrineResourceType<T> $type
     * @param T $entity
     */
    public function __construct(
        protected readonly DoctrineResourceType $type,
        protected readonly EntityInterface $entity
    ) {}

    /**
     * @return DoctrineResourceType<EntityInterface>
     */
    public function getTargetType(): DoctrineResourceType
    {
        return $this->type;
    }

    public function getEntity(): EntityInterface
    {
        return $this->entity;
    }
}
