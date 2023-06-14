<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use Exception;

interface SluggedEntityInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function getSlugs(): Collection;

    public function setSlugs(Collection $slugs);

    /**
     * Given a Slug object adds it to the Entity, updating its slugs history and sets it as current Slug.
     *
     * @return SluggedEntityInterface
     */
    public function addSlug(SlugInterface $slug);

    public function getCurrentSlug(): SlugInterface;

    /**
     * @throws Exception
     */
    public function setCurrentSlug(SlugInterface $currentSlug);

    /**
     * Returns true if the Orga already had the received slug, false otherwise.
     */
    public function hasSlugString(SlugInterface $slug): bool;

    public function isSlugCurrent(string $slug): bool;

    public function setInitialSlug();
}
