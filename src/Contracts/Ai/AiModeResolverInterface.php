<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Ai;

use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;

interface AiModeResolverInterface
{
    /**
     * Effective AI mode of the orga, always a currently allowed mode.
     * Never throws; a stored but no longer allowed mode degrades to the default.
     */
    public function resolve(OrgaInterface $orga): string;
}
