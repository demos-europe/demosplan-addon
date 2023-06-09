<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface StatementVoteInterface extends UuidEntityInterface
{
    /**
     * @return StatementInterface
     */
    public function getStatement();

    /**
     * @param StatementInterface $statement
     *
     * @return StatementVoteInterface
     */
    public function setStatement($statement);

    /**
     * @return UserInterface|null
     */
    public function getUser();

    /**
     * @param UserInterface $user
     *
     * @return StatementVoteInterface
     */
    public function setUser($user);

    /**
     * @return string
     */
    public function getUId();

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstName
     *
     * @return StatementVoteInterface
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     *
     * @return StatementVoteInterface
     */
    public function setLastName($lastName);

    /**
     * Get concatenated First and Lastname. Used in Elasticsearch.
     *
     * @return string
     */
    public function getName();

    /**
     * @return bool
     */
    public function getActive();

    /**
     * @param bool $active
     *
     * @return StatementVoteInterface
     */
    public function setActive($active);

    /**
     * @return bool
     */
    public function getDeleted();

    /**
     * @param bool $deleted
     *
     * @return StatementVoteInterface
     */
    public function setDeleted($deleted);

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @param DateTime $createdDate
     *
     * @return StatementVoteInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return DateTime
     */
    public function getModifiedDate();

    /**
     * @param DateTime $modifiedDate
     *
     * @return StatementVoteInterface
     */
    public function setModifiedDate($modifiedDate);

    /**
     * @return DateTime
     */
    public function getDeletedDate();

    /**
     * @param DateTime $deletedDate
     *
     * @return StatementVoteInterface
     */
    public function setDeletedDate($deletedDate);

    /**
     * @return bool
     */
    public function isManual();

    /**
     * @param bool $manual
     */
    public function setManual($manual);

    /**
     * @return string
     */
    public function getOrganisationName();

    /**
     * @param string $organisationName
     */
    public function setOrganisationName($organisationName);

    /**
     * @return string
     */
    public function getDepartmentName();

    /**
     * @param string $departmentName
     */
    public function setDepartmentName($departmentName);

    /**
     * @return string
     */
    public function getUserName();

    /**
     * @param string $userName
     */
    public function setUserName($userName);

    /**
     * @return string|null Will either be the address of the user that voted, a manually entered
     *                     address for that vote or null
     */
    public function getUserMail();

    /**
     * @param string $userMail
     */
    public function setUserMail($userMail);

    /**
     * @return string
     */
    public function getUserPostcode();

    /**
     * @param string $userPostcode
     */
    public function setUserPostcode($userPostcode);

    /**
     * @return string
     */
    public function getUserCity();

    /**
     * @param string $userCity
     */
    public function setUserCity($userCity);

    public function isCreatedByCitizen(): bool;

    public function setCreatedByCitizen(bool $createdByCitizen): void;
}