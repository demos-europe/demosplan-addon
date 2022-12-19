<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface EntityInterface
{
    /**
     * The unique identifier of this entity.
     *
     * Regarding potential `null` returns: Between initialization and flushing an entities ID will
     * be `null` in most cases (exceptions where it is set via PHP may exist).
     *
     * @return mixed|null
     */
    public function getId();
}

