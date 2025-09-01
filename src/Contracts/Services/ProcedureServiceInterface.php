<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;


use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use Exception;

interface ProcedureServiceInterface
{
    public function getProcedure($procedureId): ?ProcedureInterface;
    public function getMasterTemplateId(): string;
    public function deleteProcedure($procedureIds): void;
    public function getBoilerplatesOfCategory($procedureId, $category): array;
    /**
     * Update of a procedure-object.
     *
     * @return array|ProcedureInterface
     *
     * @throws Exception
     */
    public function updateProcedureObject(ProcedureInterface $procedureToUpdate);
}
