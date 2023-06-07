<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\Collection;

interface ParagraphInterface extends UuidEntityInterface
{
    public function getParent(): ?self;

    /**
     * @return $this
     */
    public function setParent(?ParagraphInterface $parent): self;

    /**
     * @return ParagraphInterface[]
     */
    public function getChildren(): array;

    /**
     * @param ParagraphInterface[] $children
     *
     * @return $this
     */
    public function setChildren(array $children): self;

    /**
     * @return $this
     */
    public function addChild(ParagraphInterface $child): self;

    /**
     * @return $this
     */
    public function removeChild(ParagraphInterface $child): self;

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

    /**
     * Set eOrder.
     */
    public function setOrder(int $order): self;

    /**
     * Get eOrder.
     */
    public function getOrder(): int;

    /**
     * Set eEnabled.
     */
    public function setVisible(int $visible): self;

    /**
     * Get eEnabled.
     */
    public function getVisible(): int;

    /**
     * Set eDeleted.
     */
    public function setDeleted(bool $deleted): self;

    /**
     * Get eDeleted.
     */
    public function getDeleted(): bool;

    /**
     * Set lockReason.
     */
    public function setLockReason(string $lockReason): self;

    /**
     * Get lockReason.
     */
    public function getLockReason(): string;

    /**
     * Set eCreateDate.
     */
    public function setCreateDate(DateTime $createDate): self;

    /**
     * Get eCreateDate.
     */
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

    /**
     * @return Collection<int, ParagraphVersionInterface>
     */
    public function getVersions(): Collection;

}