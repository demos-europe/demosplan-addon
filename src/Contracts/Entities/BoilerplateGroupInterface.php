<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

interface BoilerplateGroupInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @param string $id
     */
    public function setId($id);

    public function getTitle(): string;

    public function setTitle(string $title);

    public function getCreateDate(): DateTime;

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate);

    public function getProcedure(): ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure);

    /**
     * @return string[]
     */
    public function getCategoryTitles(): array;

    /**
     * @param string $categoryTitle
     *
     * @return BoilerplateInterface[]
     */
    public function filterBoilerplatesByCategory($categoryTitle): array;

    /**
     * @return ArrayCollection
     */
    public function getBoilerplates();

    /**
     * Returns a specific Boilerplate of this group, if exists.
     *
     * @param string $id identifies the Boilerplate
     *
     * @return BoilerplateInterface|null
     */
    public function getBoilerplate(string $id);

    /**
     * Add a specific Boilerplate to this BoilerplateGroup.
     */
    public function addBoilerplate(BoilerplateInterface $boilerplate): BoilerplateGroupInterface;

    /**
     * Removes a specific Boilerplate from this BoilerplateGroup.
     */
    public function removeBoilerplate(BoilerplateInterface $boilerplate): BoilerplateGroupInterface;

    /**
     * @param BoilerplateInterface[] $boilerplates
     */
    public function removeBoilerplates(array $boilerplates);

    /**
     * Removes all Boilerplates from this BoilerplateGroup.
     *
     * @return $this
     */
    public function removeAllBoilerplates(): BoilerplateGroupInterface;

    /**
     * @param array|ArrayCollection $boilerplates
     */
    public function setBoilerplates($boilerplates);

    /**
     * @param array|ArrayCollection $boilerplates
     */
    public function addBoilerplates($boilerplates);

    /**
     * Checks if this Group has Boilerplates.
     *
     * @return bool - true, if this there are no boilerpaltes, otherwise false
     */
    public function isEmpty(): bool;

}