<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

interface PermissionMetaInterface extends PermissionIdentifierInterface
{
    public function getLabel(): string;

    public function getDescription(): string;

    public function isExposed(): bool;
}
