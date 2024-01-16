<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface ProcedureCategoryInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @return $this
     */
    public function setId(string $id): self;

    /**
     * Set name.
     */
    public function setName(string $name): self;

    /**
     * Get name.
     */
    public function getName(): string;

    public function getSlug(): string;

    public function setSlug(string $slug): void;
}
