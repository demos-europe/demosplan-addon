<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedurePhaseDefinitionInterface;

interface ProcedurePhaseDefinitionServiceInterface
{
    public function findById(string $id): ?ProcedurePhaseDefinitionInterface;

    /** @return ProcedurePhaseDefinitionInterface[] */
    public function getInternalPhaseDefinitionsForCurrentCustomer(): array;

    /** @return ProcedurePhaseDefinitionInterface[] */
    public function getExternalPhaseDefinitionsForCurrentCustomer(): array;

    public function findEvaluatingDefinition(string $audience, ?CustomerInterface $customer): ?ProcedurePhaseDefinitionInterface;

    public function findByNameAndAudienceAndCustomer(string $name, string $audience, CustomerInterface $customer): ?ProcedurePhaseDefinitionInterface;
}
