<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

interface BoilerplateInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @param string $ident
     */
    public function setIdent($ident);

    public function getProcedureId(): string;

    /**
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     */
    public function setText($text);

    /**
     * @param bool $toString
     *
     * @return DateTime|string
     */
    public function getCreateDate($toString = true);

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate);

    /**
     * @param bool $toString
     *
     * @return DateTime|string
     */
    public function getModifyDate($toString = true);

    /**
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate);

    /**
     * @return ArrayCollection;
     */
    public function getTags();

    /**
     * Returns a specific tag of this boilerplate, if exists.
     *
     * @param string $id identifies the tag
     *
     * @return TagInterface|null
     */
    public function getTag($id);

    /**
     * Add a specific BoilerplateCategory to this Boilerplate.
     *
     * @param BoilerplateCategoryInterface $boilerplateCategory
     *
     * @return BoilerplateInterface
     */
    public function addBoilerplateCategory($boilerplateCategory);

    /**
     * Removes a specific BoilerplateCategory from this Boilerplate.
     *
     * @param BoilerplateCategoryInterface $boilerplateCategory
     *
     * @return BoilerplateInterface
     */
    public function removeBoilerplateCategory($boilerplateCategory);

    /**
     * Returns this Boilerplate's categories.
     *
     * @return ArrayCollection[BoilerplateCategory]
     */
    public function getCategories();

    /**
     * @return string[]
     */
    public function getCategoryTitles(): array;

    /**
     * @param string $categoryTitle
     *
     * @return bool
     */
    public function hasCategory($categoryTitle);

    /**
     * Sets this Boilerplate's categories.
     *
     * @param BoilerplateCategoryInterface[] $boilerplateCategories
     *
     * @return BoilerplateInterface
     */
    public function setCategories($boilerplateCategories);

    /**
     * Add a specific Tag to this Boilerplate.
     *
     * @param TagInterface $tag
     *
     * @return BoilerplateInterface
     */
    public function addTag($tag);

    /**
     * Removes a specific Tag from this Boilerplate.
     *
     * @param TagInterface $tag
     *
     * @return BoilerplateInterface
     */
    public function removeTag($tag);

    /**
     * @return BoilerplateGroupInterface|null
     */
    public function getGroup();

    public function setGroup(BoilerplateGroupInterface $group);

    public function detachGroup();

    /**
     * @return string|null
     */
    public function getGroupId();

    public function hasGroup(): bool;

}