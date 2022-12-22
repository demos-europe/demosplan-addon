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
    private ?string $addonIdentifier;

    /**
     * @param non-empty-string      $permissionName
     * @param non-empty-string|null $addonIdentifier
     */
    private function __construct(string $permissionName, ?string $addonIdentifier)
    {
        $this->permissionName = $permissionName;
        $this->addonIdentifier = $addonIdentifier;
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
     * @param non-empty-string $addonIdentifier
     */
    public static function forAddon(string $permissionName, string $addonIdentifier): self
    {
        return new self($permissionName, $addonIdentifier);
    }

    public function getAddonIdentifier(): ?string
    {
        return $this->addonIdentifier;
    }

    public function getPermissionName(): string
    {
        return $this->permissionName;
    }
}
