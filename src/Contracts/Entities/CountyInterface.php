<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

interface CountyInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @return Collection<int, CustomerCountyInterface>
     */
    public function getCustomerCounties(): Collection;

    /**
     * @param Collection<int, CustomerCountyInterface> $customerCounties
     */
    public function setCustomerCounties(Collection $customerCounties): void;

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail($email);

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
     * @return bool - true if the given statement was added to this county, otherwise false
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
