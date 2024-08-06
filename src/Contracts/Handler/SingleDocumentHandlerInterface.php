<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Handler;

use ReflectionException;

interface SingleDocumentHandlerInterface
{
    /**
     * @param string $procedureId
     *
     * @return array|array[]|bool
     *
     * @throws ReflectionException
     */
    public function administrationDocumentNewHandler($procedureId, ?string $category, string $elementID, array $data);

    /**
     * @param array $data
     *
     * @return array|bool
     *
     * @throws ReflectionException
     */
    public function administrationDocumentEditHandler($data);

    public function administrationDocumentDeleteHandler($data);
}