<?php

namespace DemosEurope\DemosplanAddon\Contracts\Handler;

use DemosEurope\DemosplanAddon\Contracts\Entities\ElementsInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface ParagraphHandlerInterface
{
    public function administrationDocumentNewHandler(string $procedure, string $category, array $data, $elementId);

    public function administrationDocumentEditHandler($procedureId, $data, $elementId);

    public function administrationDocumentDeleteHandler(ProcedureInterface $procedure, ElementsInterface $element);

}