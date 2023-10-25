<?php
declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ValueObject;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

/**
 * @method string                   getHash()
 * @method string                   getFileName()
 * @method int                      getFileSize()
 * @method string                   getContentType()
 * @method string                   getPath()
 * @method string                   getAbsolutePath()
 * @method ProcedureInterface|null  getProcedure()
 */
interface FileInfoInterface
{
}
