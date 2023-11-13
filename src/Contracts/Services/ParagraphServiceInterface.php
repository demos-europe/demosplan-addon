<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;


use DemosEurope\DemosplanAddon\Contracts\Entities\ParagraphInterface;
use ReflectionException;

interface ParagraphServiceInterface
{
    /**
     * Ruft alle Kapitel eines Plandokumentes eines Verfahrens ab
     * Die Dokumente müssen sichtbar sein (visible = true).
     *
     * @param string $procedureId
     * @param string $elementId
     *
     * @return ParagraphInterface[]
     *
     * @throws ReflectionException
     */
    public function getParaDocumentObjectList($procedureId, $elementId): array;
}
