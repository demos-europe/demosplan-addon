<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Ai;

/**
 * Modes of the per-orga AI mode that core itself knows.
 *
 * Modes are plain strings, not an enum: all other modes are declared by addons
 * via {@link AiModeProviderInterface}.
 */
final class AiModes
{
    /**
     * No AI at all for the orga, even if the addons are active.
     */
    public const NONE = 'none';

    private function __construct()
    {
    }
}
