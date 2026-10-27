<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Ai;

use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;

/**
 * Lets an addon declare which AI modes it supports and, optionally, a default.
 */
interface AiModeProviderInterface
{
    /**
     * Modes this addon can serve. {@link AiModes::NONE} is always allowed and need not be listed.
     *
     * @return array<int, string>
     */
    public function getAvailableModes(): array;

    /**
     * Default mode for an orga without an explicit choice.
     *
     * @return string|null null means no opinion
     */
    public function getDefaultMode(OrgaInterface $orga): ?string;
}
