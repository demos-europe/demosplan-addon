<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\ElementsInterface;
use Exception;

interface ElementsServiceInterface
{
    /**
     * Returns all non-deleted elements for a procedure, ordered for admin display.
     *
     * @return ElementsInterface[]
     *
     * @throws Exception
     */
    public function getElementsAdminList(string $procedureId): array;

    /**
     * Returns a single element by ID, or null if not found.
     *
     * @throws Exception
     */
    public function getElementObject(string $id): ?ElementsInterface;

    /**
     * Creates a new element and returns the persisted data array, or null on failure.
     *
     * @throws Exception
     */
    public function addElement(array $data): ?array;
}
