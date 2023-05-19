<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use League\Fractal\Resource\ArrayCollection;

interface MunicipalityInterface extends UuidEntityInterface
{
    /**
     * Return name in addition of officialMunicipalityKey if officialMunicipalityKey is set.
     *
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return ArrayCollection
     */
    public function getStatements();

    /**
     * @param ArrayCollection $statements
     */
    public function setStatements($statements);

    /**
     * Add Statement.
     *
     * @param StatementInterface $statement
     *
     * @return bool - true if the given statement was added to this municipality, otherwise false
     */
    public function addStatement($statement);

    /**
     * Remove Statement.
     *
     * @param StatementInterface $statement
     */
    public function removeStatement($statement);

    /**
     * @return ArrayCollection
     */
    public function getStatementFragments();

    /**
     * Add StatementFragment.
     *
     * @param StatementFragmentInterface $fragment
     */
    public function addStatementFragment($fragment);

    /**
     * Remove StatementFragment.
     *
     * @param StatementFragmentInterface $fragment
     */
    public function removeStatementFragment($fragment);

    /**
     * @param string|null $officialMunicipalityKey
     */
    public function setOfficialMunicipalityKey($officialMunicipalityKey);

    /**
     * @return string|null
     */
    public function getOfficialMunicipalityKey();
}