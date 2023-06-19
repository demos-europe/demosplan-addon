<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface StatementFragmentVersionInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @return StatementFragmentInterface
     */
    public function getStatementFragment();

    /**
     * @return $this
     */
    public function setStatementFragment(StatementFragmentInterface $relatedFragment);

    /**
     * @return int
     */
    public function getDisplayId();

    /**
     * @return string
     */
    public function getText();

    /**
     * @return string
     */
    public function getTagAndTopicNames();

    /**
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * @return string
     */
    public function getVoteAdvice();

    /**
     * @return string
     */
    public function getVote();

    /**
     * @return DateTime
     */
    public function getCreated();

    /**
     * @return string
     */
    public function getDepartmentName();

    /**
     * @return string
     */
    public function getConsiderationAdvice();

    /**
     * @return string
     */
    public function getConsideration();

    /**
     * @return string
     */
    public function getCountyNamesAsJson();

    /**
     * @return string
     */
    public function getPriorityAreaKeysAsJson();

    /**
     * @return string
     */
    public function getPriorityAreaNamesAsJson();

    /**
     * @return string
     */
    public function getMunicipalityNamesAsJson();

    /**
     * @return string
     */
    public function getArchivedOrgaName();

    /**
     * @return string
     */
    public function getArchivedDepartmentName();

    /**
     * @return string
     */
    public function getArchivedVoteUserName();

    /**
     * @param string $archivedVoteUserName
     */
    public function setArchivedVoteUserName($archivedVoteUserName);

    /**
     * @return string
     */
    public function getOrgaName();

    /**
     * @param string $orgaName
     *
     * @return $this
     */
    public function setOrgaName($orgaName);

    /**
     * @param int $displayId
     */
    public function setDisplayId($displayId);

    /**
     * @param string $text
     */
    public function setText($text);

    /**
     * @param string $tagAndTopicNames
     */
    public function setTagAndTopicNames($tagAndTopicNames);

    /**
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure);

    /**
     * @param string $voteAdvice
     */
    public function setVoteAdvice($voteAdvice);

    /**
     * @param string $vote
     */
    public function setVote($vote);

    /**
     * @param DateTime $created
     */
    public function setCreated($created);

    /**
     * @param string $departmentName
     */
    public function setDepartmentName($departmentName);

    /**
     * @param string $considerationAdvice
     */
    public function setConsiderationAdvice($considerationAdvice);

    /**
     * @param string $consideration
     */
    public function setConsideration($consideration);

    /**
     * @param string $archivedOrgaName
     */
    public function setArchivedOrgaName($archivedOrgaName);

    /**
     * @param string $archivedDepartmentName
     */
    public function setArchivedDepartmentName($archivedDepartmentName);

    /**
     * @return UserInterface
     */
    public function getModifiedByUser();

    /**
     * @return string|null
     */
    public function getModifiedByUserId();

    /**
     * @param UserInterface $modifiedByUser
     */
    public function setModifiedByUser($modifiedByUser);

    /**
     * @return DepartmentInterface
     */
    public function getModifiedByDepartment();

    /**
     * @return string|null
     */
    public function getModifiedByDepartmentId();

    /**
     * @param DepartmentInterface $modifiedByDepartment
     */
    public function setModifiedByDepartment($modifiedByDepartment);

    /**
     * Get elementTitle.
     *
     * @return string
     */
    public function getElementTitle();

    /**
     * @return string
     */
    public function getElementCategory();

    /**
     * @return ParagraphVersionInterface|null
     */
    public function getParagraph();

    /**
     * Get paragraphTitle.
     *
     * @return string
     */
    public function getParagraphTitle();

    /**
     * @return SingleDocumentVersionInterface
     */
    public function getDocument();

    /**
     * @param SingleDocumentVersionInterface $document
     */
    public function setDocument($document);

    /**
     * Get documentParentId.
     *
     * @return string
     */
    public function getDocumentParentId();

}