<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface CoreEntityInterface
{
    /**
     * The Database field to store content change of an Entity, is modeled as "text".
     * Therefore string, int or bool can be (casted and) stored.
     *
     * At least the ID of the object will be returned.
     *
     * @return string|int|bool
     */
    public function getEntityContentChangeIdentifier();
}
