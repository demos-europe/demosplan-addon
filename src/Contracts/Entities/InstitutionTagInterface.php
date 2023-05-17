<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\Collection;

interface InstitutionTagInterface extends UuidEntityInterface
{
    public function getOwningOrganisation(): OrgaInterface;

    /**
     * @return Collection<int, OrgaInterface>
     */
    public function getTaggedInstitutions(): Collection;

    /**
     * @param Collection<int, OrgaInterface> $institutions
     */
    public function setTaggedInstitutions(Collection $institutions): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;

    /**
     * @return bool - true if the given statement was added to this tag, otherwise false
     */
    public function addTaggedInstitution(OrgaInterface $institution): bool;

    public function getLabel(): string;

    public function setLabel(string $label): void;
}
