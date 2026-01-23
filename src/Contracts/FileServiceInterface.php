<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\FileInterface;
use DemosEurope\DemosplanAddon\Contracts\ValueObject\FileInfoInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Throwable;

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
     *
     * @deprecated Use saveTemporaryLocalFile() instead
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
     * Saves a temporary local file to the storage and returns the corresponding File entity.
     * File needs to be accessible for the file system of the current process.
     * Uses the configured default storage backend (maybe S3, local filesystem, or other adapters
     * depending on the FILES_SOURCE environment variable configuration).
     *
     * @param string      $filePath    Path to the temporary file
     * @param string      $fileName    Original filename
     * @param string|null $userId      Optional user ID
     * @param string|null $procedureId Optional procedure ID
     * @param string|null $virencheck  Virus check mode (default: VIRUSCHECK_SYNC)
     * @param string|null $hash        Optional file hash
     *
     * @return FileInterface The saved file entity
     *
     * @throws Throwable
     */
    public function saveTemporaryLocalFile(
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

    /**
     * Is the given mimetype allowed in global settings?
     *
     * @param string $mimeType
     * @param string $temporaryFilePath
     *
     * @throws FileException
     */
    public function checkMimeTypeAllowed($mimeType, $temporaryFilePath);

    /**
     * Save file from binary content (e.g., already decoded base64 content).
     *
     * This method is useful when you have file content as a string (binary data)
     * and need to save it. It creates a temporary file internally and cleans it up.
     *
     * @param string      $fileName       Original filename
     * @param string      $fileContent    Binary file content
     * @param string      $filenamePrefix Optional prefix for the temporary filename (e.g., 'xbeteiligung')
     * @param string|null $userId         Optional user ID
     * @param string|null $procedureId    Optional procedure ID
     *
     * @return FileInterface The saved file entity
     *
     * @throws Throwable
     */
    public function saveBinaryFileContent(
        string $fileName,
        string $fileContent,
        string $filenamePrefix = '',
        ?string $userId = null,
        ?string $procedureId = null
    ): FileInterface;
}
