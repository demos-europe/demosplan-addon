<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\Collection;

interface BoilerplateCategoryInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const TITLE_NEWS_NOTES = 'news.notes';
    public const TITLE_EMAIL = 'email';
    public const TITLE_CONSIDERATION = 'consideration';

    /**
     * @return string
     */
    public function getPId();

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
    public function getDescription();

    /**
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @return DateTime
     */
    public function getCreateDate();

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate);

    /**
     * @return DateTime
     */
    public function getModifyDate();

    /**
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate);

    /**
     * Add a given Boilerplate to this BoilerplateCategory.
     *
     * @param BoilerplateInterface $bp
     *
     * @return BoilerplateCategoryInterface
     */
    public function addBoilerplate($bp);

    /**
     * Remove the given Boilerplate from this BoilerplateCategory.
     *
     * @param BoilerplateInterface $boilerplate
     *
     * @return BoilerplateCategoryInterface
     */
    public function removeBoilerplate($boilerplate);

    /**
     * Return the Boilerplates attached to this BoilerplateCategory.
     *
     * @return Collection<int, BoilerplateInterface>
     */
    public function getBoilerplates();

    /**
     * @param array<int, BoilerplateInterface>|Collection<int, BoilerplateInterface> $boilerplates
     */
    public function setBoilerplates($boilerplates);

    /**
     * @param string $id
     */
    public function setId($id);
}
