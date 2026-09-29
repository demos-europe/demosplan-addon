<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Mcp;

/**
 * Sets up the procedure context for a tool call, since tools get the procedure as an argument
 * instead of a route parameter.
 */
interface McpProcedureContextInterface
{
    /**
     * Makes the procedure the current one and requires the acting user to own it.
     *
     * @throws \Mcp\Exception\ToolCallException if the procedure does not exist or the user may not enter it
     */
    public function enter(string $procedureId): void;

    /**
     * @throws \Mcp\Exception\ToolCallException if any of the permissions is missing in the current context
     */
    public function requirePermission(string ...$permissions): void;
}
