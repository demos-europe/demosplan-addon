<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\ArrayCollection;

interface PriorityAreaInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @return string
     */
    public function getKey();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $key
     */
    public function setKey($key);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     */
    public function setType($type);

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
     * @return bool - true if the given statement was added to this priorityArea, otherwise false
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
}
