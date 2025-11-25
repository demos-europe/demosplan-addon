<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Events;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;

/**
 * Event fired when preparing template variables for the procedure edit page.
 * Allows addons to extend the template variables with additional data.
 */
interface ProcedureEditTemplateVarsEventInterface
{
    /**
     * Get all template variables.
     */
    public function getTemplateVars(): array;

    /**
     * Set a single template variable.
     */
    public function setTemplateVar(string $key, mixed $value): void;

    /**
     * Get the procedure being edited.
     */
    public function getProcedure(): ProcedureInterface;
}
