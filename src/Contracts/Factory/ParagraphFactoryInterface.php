<?php

namespace DemosEurope\DemosplanAddon\Contracts\Factory;

use DemosEurope\DemosplanAddon\Contracts\Entities\ElementsInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ParagraphInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface ParagraphFactoryInterface
{
    public function deleteParagraphs(ProcedureInterface $procedure, ElementsInterface $element): bool;
}