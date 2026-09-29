<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Mcp;

use DemosEurope\DemosplanAddon\Permission\PermissionIdentifierInterface;

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
     * A string denotes a core permission; addon permissions need their
     * {@link PermissionIdentifierInterface}, as for {@link \DemosEurope\DemosplanAddon\Permission\PermissionEvaluatorInterface}.
     *
     * @param non-empty-string|PermissionIdentifierInterface ...$permissions
     *
     * @throws \Mcp\Exception\ToolCallException if any of the permissions is missing in the current context
     */
    public function requirePermission(string|PermissionIdentifierInterface ...$permissions): void;
}
