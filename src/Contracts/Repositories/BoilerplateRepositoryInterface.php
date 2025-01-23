<?php

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;


use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateInterface;

interface BoilerplateRepositoryInterface
{
    public function getByProcedureAndCategory(string $procedureId, string $categoryID): ?BoilerplateInterface;
}