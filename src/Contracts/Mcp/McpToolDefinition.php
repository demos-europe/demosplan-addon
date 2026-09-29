<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Mcp;

/**
 * A single MCP tool. Name and behaviour hints only; description and input schema come from the
 * handler method's docblock and parameter attributes.
 */
final readonly class McpToolDefinition
{
    /**
     * @param array{0: object, 1: string} $handler
     */
    private function __construct(
        public string $name,
        public array $handler,
        public bool $readOnly,
        public bool $destructive,
        public bool $idempotent,
    ) {
    }

    /**
     * @param array{0: object, 1: string} $handler
     */
    public static function read(string $name, array $handler): self
    {
        return new self($name, $handler, true, false, true);
    }

    /**
     * @param array{0: object, 1: string} $handler
     * @param bool                        $destructive may overwrite or remove existing data
     * @param bool                        $idempotent  repeating the call with the same arguments changes nothing further
     */
    public static function write(string $name, array $handler, bool $destructive = false, bool $idempotent = false): self
    {
        return new self($name, $handler, false, $destructive, $idempotent);
    }
}
