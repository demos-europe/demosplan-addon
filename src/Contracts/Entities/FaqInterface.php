<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\Collection;

interface FaqInterface extends UuidEntityInterface
{
    public function setTitle($title): self;

    /**
     * Get title.
     */
    public function getTitle(): string;

    /**
     * Set text.
     *
     * @param string $text
     */
    public function setText($text): self;

    /**
     * Get text.
     */
    public function getText(): string;

    /**
     * Set enabled.
     *
     * @param bool $enabled
     */
    public function setEnabled($enabled): self;

    /**
     * Get enabled.
     */
    public function getEnabled(): bool;

    /**
     * Set createDate.
     *
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate): self;

    /**
     * Get createDate.
     */
    public function getCreateDate(): DateTime;

    /**
     * Set modifyDate.
     *
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate): self;

    /**
     * Get modifyDate.
     */
    public function getModifyDate(): DateTime;

    /**
     * Set Roles.
     *
     * @param array<int, RoleInterface> $roles
     */
    public function setRoles($roles): self;

    /**
     * Add Role.
     */
    public function addRole(RoleInterface $role): self;

    /**
     * Get Roles.
     *
     * @return Collection<int, RoleInterface>
     */
    public function getRoles(): Collection;

    /**
     * Set Category.
     *
     * @param FaqCategoryInterface $faqCategory
     */
    public function setCategory($faqCategory): self;

    /**
     * Get Category.
     */
    public function getCategory(): FaqCategoryInterface;

    public function hasRoleGroupCode(string $code): bool;
}