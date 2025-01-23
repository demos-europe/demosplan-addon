<?php

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;


use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateCategoryInterface;

interface BoilerplateCategoryRepositoryInterface
{
    public function getByProcedureAndTitle(string $procedureId, string $boilerplateCategoryTitle): ?BoilerplateCategoryInterface;
}