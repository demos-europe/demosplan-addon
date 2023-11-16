<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

interface StatementFragmentInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const VALIDATION_GROUP_MANDATORY = 'mandatory';

    /**
     * @return StatementInterface
     */
    public function getStatement();

    /**
     * @param StatementInterface $statement
     *
     * @return StatementFragmentInterface
     */
    public function setStatement($statement);

    /**
     * Get statementId for easier use in Elasticsearch.
     *
     * @return string
     */
    public function getStatementId();

    /**
     * @return int
     */
    public function getDisplayIdRaw();

    /**
     * Pad DisplayId with 0, as Elasticsearch could not sort desc in the ancient version
     * we have to use.
     *
     * @return string
     */
    public function getDisplayId();

    /**
     * @param int $displayId
     */
    public function setDisplayId($displayId);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     *
     * @return StatementFragmentInterface
     */
    public function setText($text);

    /**
     * @return ArrayCollection
     */
    public function getTags();

    /**
     * Note: Please search via string search to find usage of method.
     *
     * @return string[]
     */
    public function getTagIds();

    /**
     * Returns the names of all Tags assigned to this Statement.
     *
     * @return array()
     */
    public function getTagNames();

    /**
     * @return string
     */
    public function getTagsAndTopicsAsString();

    public function getTagsAndTopics();

    public function getTopics();

    /**
     * @param ArrayCollection|array $tags
     *
     * @return StatementFragmentInterface
     */
    public function setTags($tags);

    /**
     * Adds a tag to this statement fragment.
     *
     * @param TagInterface $tag
     */
    public function addTag(TagInterface $tag);

    /**
     * Removes a tag to this statement fragment.
     *
     * @param TagInterface $tag
     */
    public function removeTag(TagInterface $tag);

    /**
     * Set procedure.
     *
     * @param ProcedureInterface $procedure
     *
     * @return StatementFragmentInterface
     */
    public function setProcedure($procedure);

    /**
     * Get procedure.
     *
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * Get procedureId for easier use in Elasticsearch.
     *
     * @return string
     */
    public function getProcedureId();

    /**
     * Get procedureName for easier use in Elasticsearch.
     *
     * @return string
     */
    public function getProcedureName();

    /**
     * @return DateTime
     */
    public function getCreated();

    /**
     * @return DateTime
     */
    public function getModified();

    /**
     * Needed to create a StatementFragment from StatementFragmentDataObject.
     *
     * @param string $id
     */
    public function setId($id);

    /**
     * @return string|null
     */
    public function getVoteAdvice();

    /**
     * @param string|null $voteAdvice
     */
    public function setVoteAdvice($voteAdvice): self;

    /**
     * @return string|null
     */
    public function getVote();

    /**
     * @param string|null $vote
     */
    public function setVote($vote): self;

    /**
     * @param string|null $vote;

    /**
     * @return DepartmentInterface
     */
    public function getDepartment();

    /**
     * @param DepartmentInterface|null $department
     *
     * @return $this
     */
    public function setDepartment($department);

    /**
     * Return DepartmentId for easier use in Elasticsearch.
     *
     * @return string|null
     */
    public function getDepartmentId();

    /**
     * @return string|null
     */
    public function getConsiderationAdvice();

    /**
     * @param string|null $considerationAdvice
     */
    public function setConsiderationAdvice($considerationAdvice): self;

    /**
     * @return string|null
     */
    public function getConsideration();

    /**
     * @param string|null $consideration
     */
    public function setConsideration($consideration): self;

    public function addConsiderationParagraph(string $additionalConsiderationParagraphText);

    /**
     * @return ArrayCollection
     */
    public function getCounties();

    /**
     * Returns an array of ids.
     * Note: Please search via string search to find usage of method.
     *
     * @return string[]
     */
    public function getCountyIds();

    /**
     * Returns an array of names.
     *
     * @return string[]
     */
    public function getCountyNames();

    /**
     * @param ArrayCollection|CountyInterface[] $counties
     *
     * @return $this
     */
    public function setCounties($counties);

    /**
     * Add County.
     *
     * @param CountyInterface $county
     */
    public function addCounty($county);

    /**
     * Remove County.
     *
     * @param CountyInterface $county
     */
    public function removeCounty($county);

    /**
     * @return ArrayCollection
     */
    public function getPriorityAreas();

    /**
     * Returns an array of ids.
     * Note: Please search via string search to find usage of method.
     *
     * @return string[]
     */
    public function getPriorityAreaIds();

    /**
     * Returns an array of names.
     *
     * @return string[]
     */
    public function getPriorityAreaKeys();

    /**
     * @param ArrayCollection|PriorityAreaInterface[] $priorityAreas
     *
     * @return $this
     */
    public function setPriorityAreas($priorityAreas);

    /**
     * Add Priority Area.
     */
    public function addPriorityArea(PriorityAreaInterface $priorityArea);

    /**
     * Remove Priority Area.
     */
    public function removePriorityArea(PriorityAreaInterface $priorityArea);

    /**
     * @return ArrayCollection
     */
    public function getMunicipalities();

    /**
     * Returns an array of ids.
     * Note: Please search via string search to find usage of method.
     *
     * @return string[]
     */
    public function getMunicipalityIds();

    /**
     * Returns an array of names.
     *
     * @return string[]
     */
    public function getMunicipalityNames();

    /**
     * @param ArrayCollection|MunicipalityInterface[] $municipalities
     *
     * @return $this
     */
    public function setMunicipalities($municipalities);

    /**
     * Add Municipality.
     */
    public function addMunicipality(MunicipalityInterface $municipality);

    /**
     * Remove Municipality.
     */
    public function removeMunicipality(MunicipalityInterface $municipality);

    /**
     * @return string|null
     */
    public function getArchivedOrgaName();

    /**
     * @param string|null $archivedOrgaName
     */
    public function setArchivedOrgaName($archivedOrgaName);

    /**
     * @return DepartmentInterface
     */
    public function getArchivedDepartment();

    /**
     * @param DepartmentInterface|null $archivedDepartment
     */
    public function setArchivedDepartment($archivedDepartment);

    /**
     * Return DepartmentId for easier use in Elasticsearch.
     *
     * @return string|null
     */
    public function getArchivedDepartmentId();

    /**
     * @return string|null
     */
    public function getArchivedDepartmentName();

    /**
     * @param string|null $archivedDepartmentName
     */
    public function setArchivedDepartmentName($archivedDepartmentName);

    /**
     * @return string|null
     */
    public function getArchivedVoteUserName();

    /**
     * @param string|null $archivedVoteUserName
     */
    public function setArchivedVoteUserName($archivedVoteUserName);

    /**
     * @return UserInterface
     */
    public function getAssignee();

    /**
     * @param UserInterface|null $assignee
     */
    public function setAssignee($assignee);

    /**
     * @return Collection<int,StatementFragmentVersionInterface>
     */
    public function getVersions();

    /**
     * @param Collection<StatementFragmentVersionInterface>|array $versions
     */
    public function setVersions($versions);

    /**
     * Will add a Version at the beginning of the array to ensure order by created 'desc'.
     *
     * @param StatementFragmentVersionInterface $version
     */
    public function addVersion($version);

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
     * @return string
     */
    public function getStatus();

    /**
     * @param string $status
     */
    public function setStatus($status);

    /**
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/claim/ wiki: claiming
     *
     * @return UserInterface
     */
    public function getLastClaimed();

    /**
     * @param UserInterface $user
     *
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/claim/ wiki: claiming
     */
    public function setLastClaimed($user = null);

    /**
     * Virtual property for easier Elasticsearch handling.
     *
     * @return string|null
     */
    public function getLastClaimedUserId();

    /**
     * Get elementId.
     *
     * @return string
     */
    public function getElementId();

    /**
     * Get elementOrder.
     *
     * @return int
     */
    public function getElementOrder();

    /**
     * Get elementTitle.
     *
     * @return string
     */
    public function getElementTitle();

    /**
     * Get categoryType.
     *
     * Returns the category of the element that this statement refers to
     *
     * @return string
     */
    public function getElementCategory();

    /**
     * @return ElementsInterface|null
     */
    public function getElement();

    /**
     * @param ElementsInterface|null $element
     */
    public function setElement($element);

    /**
     * @return ParagraphVersionInterface|null
     */
    public function getParagraph();

    /**
     * @param ParagraphVersionInterface|null $paragraph
     */
    public function setParagraph($paragraph);

    /**
     * Get paragraphId.
     *
     * @return string
     */
    public function getParagraphId();

    /**
     * Get paragraphTitle.
     *
     * @return string
     */
    public function getParagraphTitle();

    /**
     * Get paragraphOrder.
     *
     * @return string
     */
    public function getParagraphOrder();

    /**
     * Get paragraphParentId.
     *
     * @return string
     */
    public function getParagraphParentId();

    /**
     * @return string|null returns the title of the parent paragraph (the paragraph of the paragraph version)
     */
    public function getParagraphParentTitle();

    /**
     * @return SingleDocumentVersionInterface
     */
    public function getDocument();
    /**
     * @param SingleDocumentVersionInterface $document
     */
    public function setDocument($document);

    /**
     * @return DateTime
     */
    public function getAssignedToFbDate();

    /**
     * @param DateTime $assignedToFbDate
     */
    public function setAssignedToFbDate($assignedToFbDate);

    /**
     * Tells Elasticsearch whether Entity should be indexed.
     *
     * @return bool
     */
    public function shouldBeIndexed();

    /**
     * Needed to create a grouped structure for an export in createElementsGroupStructure2().
     * This method allows to create a group structure with paragraphs and documents on the same level.
     */
    public function getParagraphParentIdOrDocumentParentId(): ?string;

    /**
     * Needed to create a grouped structure for an export in createElementsGroupStructure2().
     * This method allows to create a group structure with paragraphs and documents on the same level.
     */
    public function getParagraphParentTitleOrDocumentParentTitle(): ?string;

    /**
     * Get documentParentId.
     *
     * @return string
     */
    public function getDocumentParentId();

    // @improve T13720

    /**
     * @return string|null
     */
    public function getDocumentParentTitle();

    public function setCreated(DateTime $created);

    public function setModified(DateTime $modified);

    public function getSortIndex(): int;

    public function setSortIndex(int $sortIndex): void;

}