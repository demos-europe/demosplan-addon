<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

interface PermissionIdentifierInterface
{
    /**
     * @return non-empty-string|null `null` if this instance denotes a core permission
     */
    public function getAddonIdentifier(): ?string;

    /**
     * @return non-empty-string
     */
    public function getPermissionName(): string;
}
