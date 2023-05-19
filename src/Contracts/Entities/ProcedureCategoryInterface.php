<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface ProcedureCategoryInterface extends UuidEntityInterface
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