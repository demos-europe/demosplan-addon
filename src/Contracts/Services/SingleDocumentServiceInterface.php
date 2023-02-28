<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\SingleDocumentInterface;
use Exception;
use ReflectionException;

interface SingleDocumentServiceInterface
{
    /**
     * Ruft ein einzelnes Dokument auf.
     *
     * @param string $ident
     *
     * @return SingleDocumentInterface|array|null
     *
     * @throws ReflectionException
     *
     * @psalm-return SingleDocumentInterface|array{statement_enabled: mixed}|null
     */
    public function getSingleDocument($ident, bool $legacy = true);

    /**
     * Ruft alle Documente eines Verfahrens ab
     * Die Dokumente müssen nicht sichtbar sein (visible = false oder true).
     *
     * @param string $procedureId
     * @param string $search
     *
     * @return array
     *
     * @throws ReflectionException
     */
    public function getSingleDocumentAdminListAll($procedureId, $search = null);

    /**
     * Create Version of SingleDocument.
     *
     * @throws Exception
     */
    public function createSingleDocumentVersion(SingleDocumentInterface $singleDocument);

}
