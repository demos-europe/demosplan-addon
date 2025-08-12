<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;


use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

interface ProcedureServiceInterface
{
    public function getProcedure($procedureId): ?ProcedureInterface;
    public function getMasterTemplateId(): string;
    public function deleteProcedure($procedureIds): void;
    public function getBoilerplatesOfCategory($procedureId, $category): array;
    public function updateProcedure($data, bool $createReports = true);
}
