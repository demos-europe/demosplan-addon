<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface BrandingInterface extends UuidEntityInterface
{
    public function getCssvars(): ?string;

    public function setCssvars(?string $cssVars): self;

    public function getLogo(): ?FileInterface;

    public function setLogo(?FileInterface $logo): void;
}
