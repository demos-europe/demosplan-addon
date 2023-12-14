<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\FileInterface;
use DemosEurope\DemosplanAddon\Contracts\ValueObject\FileInfoInterface;
use demosplan\DemosPlanCoreBundle\Entity\File;

/**
 * @method FileInfoInterface getFileInfoFromFileString($fileString)
 */
interface FileServiceInterface
{
    /**
     * Die Datei wird nach dem Upload zum FileService direkt auf Viren geprüft.
     */
    final public const VIRUSCHECK_SYNC = 'sync';

    /**
     * Save a temporary file as regular file by its path.
     */
    public function saveTemporaryFile(
        string $filePath,
        string $fileName,
        ?string $userId = null,
        ?string $procedureId = null,
        ?string $virencheck = FileServiceInterface::VIRUSCHECK_SYNC,
        ?string $hash = null
    ): FileInterface;

    /**
     * @param string $fileId
     *
     * @return FileInterface|null
     */
    public function getFileById($fileId);
}
