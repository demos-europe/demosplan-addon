<?php

namespace DemosEurope\DemosplanAddon\Contracts\Events;

interface UpdateTagEventInterface
{
    public function getTagId(): string;
}