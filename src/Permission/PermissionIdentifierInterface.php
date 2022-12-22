<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

interface PermissionIdentifierInterface
{
    /**
     * @return non-empty-string|null `null` if it is a core permission
     */
    public function getAddonName(): ?string;

    /**
     * @return non-empty-string
     */
    public function getPermissionName(): string;
}
