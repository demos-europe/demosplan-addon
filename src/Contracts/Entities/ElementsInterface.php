<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

interface ElementsInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const ELEMENTS_CATEGORY_MAP = 'map'; // like "Planzeichnung"
    public const ELEMENTS_CATEGORY_STATEMENT = 'statement'; // like "Gesamtstellungnahme" or "Fehlanzeige"
    public const ELEMENTS_CATEGORY_FILE = 'file'; // like "Ergänzende Unterlagen" or "Landschaftsplan-Änderung"
    public const ELEMENTS_CATEGORY_PARAGRAPH = 'paragraph'; // like "Begründung" or "Textliche Festsetzungen"
    public const ELEMENTS_CATEGORY_CATEGORY = 'category'; // created element by customer
    public const FILE_TYPE_ARBEITSKREISPAPIER = 'Arbeitskreispapier I und II';
    public const FILE_TYPE_ARBEITSKREISPAPIER_I = 'AKI-Papier';
    public const FILE_TYPE_ARBEITSKREISPAPIER_II = 'AKII-Papier';
    public const FILE_TYPE_BEGRUENDUNG = 'Begründung';
    public const FILE_TYPE_ERGAENZENDE_UNTERLAGE = 'ergänzende Unterlage';
    public const FILE_TYPE_FNP_AENDERUNG = 'FNP-Änderung';
    public const FILE_TYPE_GROBABSTIMMUNGSPAPIER = 'Grobabstimmungspapier';
    public const FILE_TYPE_GUTACHTEN = 'Gutachten';
    public const FILE_TYPE_LAPRO_AENDERUNG = 'LaPro-Änderung';
    public const FILE_TYPE_NIEDERSCHRIFT_GROBABSTIMMUNG_ARBEITSKREISE = 'Niederschrift (Grobabstimmung, Arbeitskreise)';
    public const FILE_TYPE_NIEDERSCHRIFT_SONSTIGE = 'Niederschrift (sonstige)';
    public const FILE_TYPE_PLANZEICHNUNG = 'Planzeichnung';
    public const FILE_TYPE_SCOPING_PAPIER = 'Scopingpapier';
    public const FILE_TYPE_SCOPING_PROTOKOLL = 'Scoping-Protokoll';
    public const FILE_TYPE_VERORDNUNG = 'Verordnung';
    public const FILE_TYPE_VERTEILER = 'Verteiler';
    public const STATEMENT_TYPE_FEHLANZEIGE = 'Fehlanzeige';

    /**
     * The maximum number of parents (technically) allowed when nesting {@link ElementsInterface} entities.
     *
     * E.g. `0` and smaller values would mean that no nesting of {@link ElementsInterface} entities is
     * allowed. This value can be increased/decreased if necessary but before that look up and
     * understand its usage, as it has performance implications.
     */
    public const MAX_PARENTS_COUNT = 10;

    /**
     * Set parent ElementId.
     */
    public function setElementParentId(?string $parentId): self;

    /**
     * Set parent element.
     *
     * @param ElementsInterface|null $parent
     */
    public function setParent(?ElementsInterface $parent): void;

    /**
     * Get parent element.
     */
    public function getParent(): ?ElementsInterface;

    /**
     * Get the Id of the related ParentElement.
     */
    public function getElementParentId(): ?string;

    /**
     * Set procedureId named pId.
     */
    public function setPId(string $pId): self;

    public function getProcedure(): ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure): self;

    public function setCategory(string $category): self;

    public function getCategory(): string;

    public function setTitle(string $title): self;

    public function getTitle(): string;

    public function setIcon(string $icon): self;

    public function getIcon(): string;

    public function setText(string $text): self;

    public function getText(): string;

    public function getFile(): string;

    public function setFile(string $file): void;

    public function setOrder(int $order): self;

    public function getOrder(): int;

    public function setEnabled(bool $enabled): self;

    public function getEnabled(): bool;

    public function setDeleted(bool $deleted): self;

    public function getDeleted(): bool;

    public function setCreateDate(DateTime $createDate): self;

    public function getCreateDate(): DateTime;

    public function setModifyDate(DateTime $modifyDate): self;

    public function getModifyDate(): DateTime;

    public function setDeleteDate(DateTime $deleteDate): self;

    public function getDeleteDate(): DateTime;

    /**
     * @return ArrayCollection|SingleDocumentInterface[]
     */
    public function getDocuments(): Collection;

    /**
     * @param ArrayCollection $documents
     */
    public function setDocuments(Collection $documents): void;

    /**
     * @return Collection<int,ElementsInterface>|ElementsInterface[]
     */
    public function getChildren(): Collection;

    /**
     * @param ArrayCollection $children
     */
    public function setChildren(Collection $children): void;

    /**
     * @return Collection<int,OrgaInterface>|OrgaInterface[]
     */
    public function getOrganisations(): Collection;

    /**
     * @param Collection<int, OrgaInterface> $organisations
     */
    public function setOrganisations(Collection $organisations): void;

    public function addOrganisation(OrgaInterface $organisation): void;

    public function removeOrganisation(OrgaInterface $organisation): void;

    public function getDesignatedSwitchDate(): ?DateTime;

    public function setDesignatedSwitchDate(?DateTime $designatedSwitchDate): void;

    public function getIconTitle(): string;

    public function setIconTitle(string $iconTitle): void;

    /**
     * This method will lead to an endless loop if an element can be have a child which have this element as a child.
     *
     * @return int - number of child elements including all children of children
     */
    public function countChildrenRecursively(): int;

    public function getPermission(): ?string;

    public function hasPermission(?string $permissionString): bool;

    /**
     * Will replace incoming empty string with null.
     */
    public function setPermission(string $permission): void;

}
