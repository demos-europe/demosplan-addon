<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

/**
 * @deprecated use enums implementing {@link PermissionIdentifierInterface} instead
 */
class PermissionIdentifier implements PermissionIdentifierInterface
{
    /**
     * @var non-empty-string
     */
    private string $permissionName;

    /**
     * @var non-empty-string|null
     */
    private ?string $addonName;

    /**
     * @param non-empty-string $permissionName
     * @param non-empty-string|null $addonName
     */
    private function __construct(string $permissionName, ?string $addonName)
    {
        $this->permissionName = $permissionName;
        $this->addonName = $addonName;
    }

    /**
     * @param non-empty-string $permissionName
     */
    public static function forCore(string $permissionName): self
    {
        return new self($permissionName, null);
    }

    /**
     * @param non-empty-string $permissionName
     * @param non-empty-string $addonName
     */
    public static function forAddon(string $permissionName, string $addonName): self
    {
        return new self($permissionName, $addonName);
    }

    public function getAddonName(): ?string
    {
        return $this->addonName;
    }

    public function getPermissionName(): string
    {
        return $this->permissionName;
    }
}
