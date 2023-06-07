<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use DateTime;

interface SingleDocumentInterface
{
    public const IMPORT_CREATION = 'importCreation';

    /**
     * Set procedure.
     */
    public function setProcedure(ProcedureInterface $procedure): self;

    /**
     * Get procedure.
     */
    public function getProcedure(): ProcedureInterface;

    /**
     * Get pId.
     *
     * @return string
     */
    public function getPId();

    /**
     * Get elementId.
     *
     * @return string
     */
    public function getElementId();

    public function getElement(): ElementsInterface;

    public function setElement(ElementsInterface $element): void;

    /**
     * Set eCategory.
     */
    public function setCategory(string $category): self;

    /**
     * Get eCategory.
     */
    public function getCategory(): string;

    /**
     * Set eTitle.
     */
    public function setTitle(string $title): self;

    /**
     * Get eTitle.
     */
    public function getTitle(): string;

    /**
     * Set eText.
     */
    public function setText(string $text): self;

    /**
     * Get eText.
     */
    public function getText(): string;

    public function getSymbol(): string;

    public function setSymbol(string $symbol): void;

    public function getDocument(): string;

    public function setDocument(string $document): void;

    /**
     * @return Collection<int, SingleDocumentVersionInterface>
     */
    public function getVersions(): Collection;

    /**
     * Set Order.
     */
    public function setOrder(int $order): self;

    /**
     * Get Order.
     */
    public function getOrder(): int;

    public function isStatementEnabled(): bool;

    public function setStatementEnabled(bool $statementEnabled): void;

    /**
     * Set eEnabled.
     */
    public function setVisible(bool $visible): self;

    /**
     * Get eEnabled.
     */
    public function getVisible(): bool;

    /**
     * Set eDeleted.
     */
    public function setDeleted(bool $deleted): self;

    /**
     * Get eDeleted.
     */
    public function getDeleted(): bool;

    /**
     * Set eCreateDate.
     */
    public function setCreateDate(DateTime $createDate): self;

    public function getCreateDate(): DateTime;
    /**
     * Set eModifyDate.
     */
    public function setModifyDate(DateTime $modifyDate): self;

    /**
     * Get eModifyDate.
     */
    public function getModifyDate(): DateTime;

    /**
     * Set eDeleteDate.
     */
    public function setDeleteDate(DateTime $deleteDate): self;

    /**
     * Get eDeleteDate.
     */
    public function getDeleteDate(): DateTime;
}
