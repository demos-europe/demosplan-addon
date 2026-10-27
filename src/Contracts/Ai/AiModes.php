<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Ai;

/**
 * Shared vocabulary for the per-orga AI mode.
 *
 * Modes are plain strings, not an enum, so addons can contribute additional ones
 * via {@link AiModeProviderInterface}.
 */
final class AiModes
{
    /**
     * No AI at all for the orga, even if the addons are active.
     */
    public const NONE = 'none';

    /**
     * AI features run via the classic AI pipeline.
     */
    public const CLASSIC = 'classic';

    /**
     * AI features run via the LLM-based AI pipeline.
     */
    public const LLM = 'llm';

    private function __construct()
    {
    }
}
