<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Mcp;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Contributes tools to the MCP endpoint. Any bundle, addons included, can implement it; the
 * endpoint collects all implementations, so it never needs to know the individual tool classes.
 */
#[AutoconfigureTag(self::TAG)]
interface McpToolProviderInterface
{
    public const TAG = 'dplan.mcp.tool_provider';

    /**
     * @return list<McpToolDefinition>
     */
    public function getTools(): array;

    /**
     * Hints on how these tools fit together, appended to the server instructions. Empty if the
     * tool descriptions say it all.
     */
    public function getInstructions(): string;
}
