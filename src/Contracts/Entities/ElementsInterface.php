<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

interface ElementsInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const ELEMENT_CATEGORIES = [
        'map' => 'map',
        'statement' => 'statement',
        'file' =>  'file',
        'paragraph' => 'paragraph',
        'category' => 'category',
    ];

    public const ELEMENT_TITLES = [
        'arbeitskreispapier' => 'Arbeitskreispapier I und II',
        'arbeitskreispapier_i' => 'AKI-Papier',
        'arbeitskreispapier_ii' => 'AKII-Papier',
        'begruendung' => 'Begründung',
        'ergaenzende_unterlage' => 'ergänzende Unterlage',
        'fnp_aenderung' => 'FNP-Änderung',
        'grobabstimmungspapier' => 'Grobabstimmungspapier',
        'gutachten' => 'Gutachten',
        'lapro_aenderung' => 'LaPro-Änderung',
        'niederschrift_grobabstimmung_arbeitskreise' => 'Niederschrift (Grobabstimmung, Arbeitskreise)',
        'niederschrift_sonstige' => 'Niederschrift (sonstige)',
        'planzeichnung' => 'Planzeichnung',
        'scoping_papier' => 'Scopingpapier',
        'scoping_protokoll' => 'Scoping-Protokoll',
        'verordnung' => 'Verordnung',
        'verteiler' => 'Verteiler',
        'fehlanzeige' => 'Fehlanzeige',
        'weitere_information' => 'weitere Information',
        'landschaftsplan_aenderung' => 'Landschaftsplan-Änderung',
        'fnp_berichtigung' => 'FNP-Berichtigung',
        'textliche_festsetzungen' => 'Textliche Festsetzungen',
        'gesamtstellungnahme' => 'Gesamtstellungnahme',
        'ergaenzende_unterlagen' => 'Ergänzende Unterlagen',
        'verordnung_text_teil_b' => 'Verordnung - Text Teil B',
        'niederschriften' => 'Niederschriften',
        'untersuchungen' => 'Untersuchungen',
        'untersuchung' => 'Untersuchung',
        'verteiler_und_einladung' => 'Verteiler und Einladung',
        'arbeitskreispapier_0' => 'Arbeitskreispapier',
        'infoblatt' => 'Infoblatt',
        'infoblatt_scoping_papier_nur_scoping_protokoll' => 'Infoblatt, Scoping-Papier nur Scoping-Protokoll',
        'staedtebauliche_vertraege_ergaenzende_unterlagen' => 'Städtebauliche Verträge / Ergänzende Unterlagen',
        'protokolle_und_niederschriften' => 'Protokoll(e) und Niederschrift(en)',
    ];

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
