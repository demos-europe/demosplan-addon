<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use Exception;
use Symfony\Component\HttpFoundation\Request;

interface FileUploadServiceInterface
{
    /**
     * Save the uploaded files in the file service.
     *
     * Warning: don't omit the $field parameter when accessing multiple fields. The returned array
     * is supposed to contain one entry for each field with the entry containing the file(s) for that
     * field. However, in reality one of the entries did contain a file from a different entry.
     *
     * @param string|null $field will return all files if set to null
     *
     * @return array|string Fileservice hash
     *
     * @throws Exception
     */
    public function prepareFilesUpload(Request $request, $field = null, bool $suppressWarning = false);
}
