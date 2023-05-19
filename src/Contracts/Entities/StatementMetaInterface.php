<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface StatementMetaInterface extends UuidEntityInterface
{
    public const USER_GROUP = 'userGroup';
    public const USER_ORGANISATION = 'userOrganisation';
    public const USER_POSITION = 'userPosition';
    public const USER_STATE = 'userState';
    public const SUBMITTER_ROLE = 'submitterRole';
    public const USER_PHONE = 'userPhone';
    public const SUBMITTER_ROLE_CITIZEN = 'citizen';
    public const SUBMITTER_ROLE_PUBLIC_AGENCY = 'publicagency';

    /**
     * @param string $id
     */
    public function setId($id);

    public function getId(): ?string;

    /**
     * Set author.
     *
     * @return StatementMetaInterface
     */
    public function setStatement(StatementInterface $statement);

    /**
     * Get Statement.
     *
     * @return StatementInterface
     */
    public function getStatement();

    /**
     * @return string
     */
    public function getStatementId();

    /**
     * Set author.
     *
     * @param string $authorName
     */
    public function setAuthorName($authorName): self;

    public function getAuthorName(): string;

    public function setAuthorFeedback(bool $authorFeedback): self;

    public function getAuthorFeedback(): bool;

    /**
     * Set SubmitUser.
     *
     * @param string|null $submitUId
     */
    public function setSubmitUId($submitUId): self;

    /**
     * Get submitUser.
     *
     * @return string
     */
    public function getSubmitUId(): ?string;

    public function getSubmitName(): string;

    /**
     * @param string $submitName
     */
    public function setSubmitName($submitName): void;

    /**
     * Get submitter LastName.
     * Algorithm is rather stupid, cannot cope with "von und zu Itzstein" or "da silva".
     *
     * This method is used to index data into elasticsearch and not obviously called via PHP.
     */
    public function getSubmitLastName(): string;

    /**
     * Set OrgaName.
     *
     * @param string $orgaName
     */
    public function setOrgaName($orgaName): self;

    /**
     * Get orgaName.
     */
    public function getOrgaName(): string;

    /**
     * Set orgaDepartmentName.
     *
     * @param string $orgaDepartmentName
     */
    public function setOrgaDepartmentName($orgaDepartmentName): self;

    /**
     * Get orgaDepartmentName.
     */
    public function getOrgaDepartmentName(): string;

    /**
     * Set orgaCaseWorkerName.
     *
     * @param string $caseWorkerName
     *
     * @return StatementMetaInterface
     */
    public function setCaseWorkerName($caseWorkerName);

    /**
     * Get orgaCaseWorkerName.
     *
     * @return string
     */
    public function getCaseWorkerName();

    /**
     * Get orgaCaseWorker LastName.
     * Algorithm is rather stupid, cannot cope with "von und zu Itzstein" or "da silva".
     *
     * @return string
     */
    public function getCaseWorkerLastName();

    /**
     * Set orgaStreet.
     *
     * @param string $orgaStreet
     *
     * @return StatementMetaInterface
     */
    public function setOrgaStreet($orgaStreet);

    /**
     * Get orgaStreet.
     */
    public function getOrgaStreet(): string;

    /**
     * Set orgaPostalCode.
     *
     * @param string $orgaPostalCode
     *
     * @return StatementMetaInterface
     */
    public function setOrgaPostalCode($orgaPostalCode);

    /**
     * Get orgaPostalCode.
     */
    public function getOrgaPostalCode(): string;

    /**
     * Set orgaCity.
     *
     * @param string $orgaCity
     *
     * @return StatementMetaInterface
     */
    public function setOrgaCity($orgaCity);

    /**
     * Get orgaCity.
     */
    public function getOrgaCity(): string;

    /**
     * Set orgaEmail.
     *
     * @param string $orgaEmail
     *
     * @return StatementMetaInterface
     */
    public function setOrgaEmail($orgaEmail);

    /**
     * Get orgaEmail.
     *
     * @return string
     */
    public function getOrgaEmail();

    /**
     * get authoredDate as timestamp.
     *
     * @return int
     */
    public function getAuthoredDate();

    /**
     * @return DateTime
     */
    public function getAuthoredDateObject();

    /**
     * @param DateTime|null $authoredDate
     */
    public function setAuthoredDate($authoredDate);

    /**
     * @return string
     */
    public function getSubmitOrgaId();

    /**
     * @param string $submitOrgaId
     */
    public function setSubmitOrgaId($submitOrgaId);

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function getMiscDataValue($key);

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return StatementMetaInterface
     */
    public function setMiscDataValue($key, $value);

    /**
     * @return array
     */
    public function getMiscData();

    /**
     * @param array $miscData
     */
    public function setMiscData($miscData);

    /**
     * Elasticsearch indexvariable project specific.
     *
     * @return string|null
     */
    public function getUserGroup();

    /**
     * Elasticsearch indexvariable project specific.
     *
     * @return string|null
     */
    public function getUserPosition();

    /**
     * Elasticsearch indexvariable project specific.
     *
     * @return string|null
     */
    public function getUserOrganisation();

    /**
     * Elasticsearch indexvariable project specific.
     *
     * @return string|null
     */
    public function getUserState();

    public function getHouseNumber(): string;

    public function setHouseNumber(string $houseNumber): void;

}