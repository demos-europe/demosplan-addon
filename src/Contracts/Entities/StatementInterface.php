<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;

interface StatementInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const IMPORT_VALIDATION = 'import';
    public const DEFAULT_VALIDATION = 'Default';
    public const MANUAL_CREATE_VALIDATION = 'manual_create';

    public const INTERNAL = 'internal';
    public const EXTERNAL = 'external';

    /**
     * Type used for statements submitted via public participation functionalities.
     */
    public const SUBMIT_TYPE_SYSTEM = 'system';
    // more submission types, see form_options.yml
    public const SUBMIT_TYPE_EMAIL = 'email';
    public const SUBMIT_TYPE_FAX = 'fax';
    public const SUBMIT_TYPE_LETTER = 'letter';
    public const SUBMIT_TYPE_EAKTE = 'eakte';
    public const SUBMIT_TYPE_DECLARATION = 'declaration';
    public const SUBMIT_TYPE_UNKNOWN = 'unknown';
    public const SUBMIT_TYPE_UNSPECIFIED = 'unspecified';
    public const SUPPORT_TYPE_E_AKTE = 'eakte';
    public const SUBMIT_TYPES = [
        StatementInterface::SUBMIT_TYPE_UNKNOWN,
        StatementInterface::SUBMIT_TYPE_DECLARATION,
        StatementInterface::SUBMIT_TYPE_EAKTE,
        StatementInterface::SUBMIT_TYPE_EMAIL,
        StatementInterface::SUBMIT_TYPE_FAX,
        StatementInterface::SUBMIT_TYPE_LETTER,
        StatementInterface::SUBMIT_TYPE_SYSTEM,
        StatementInterface::SUBMIT_TYPE_UNSPECIFIED,
    ];
    /**
     * For documentation, see Statement->publicVerifiedMapping.
     */
    public const PUBLICATION_NO_CHECK_SINCE_PERMISSION_DISABLED = 'no_check_permission_disabled';

    /**
     * For documentation, see {@link publicVerifiedMapping}.
     */
    public const PUBLICATION_NO_CHECK_SINCE_NOT_ALLOWED = 'no_check_since_not_allowed';

    /**
     * For documentation, see {@link publicVerifiedMapping}.
     */
    public const PUBLICATION_PENDING = 'publication_pending';

    /**
     * For documentation, see {@link publicVerifiedMapping}.
     */
    public const PUBLICATION_REJECTED = 'publication_rejected';

    /**
     * For documentation, see {@link publicVerifiedMapping}.
     */
    public const PUBLICATION_APPROVED = 'publication_approved';

    /**
     * One of probably three options to determine that there is no mapFile given.
     */
    public const MAP_FILE_EMPTY_DASHED = '---';

    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return StatementInterface
     */
    public function getParent();

    /**
     * Parent-Statement, of which this Statement was copied.
     *
     * @param StatementInterface $parent
     *
     * @return $this
     */
    public function setParent($parent);

    /**
     * @param StatementInterface $child
     *
     * @return $this
     */
    public function addChild($child);

    /**
     * @param StatementInterface $child
     *
     * @return $this
     */
    public function removeChild($child);

    /**
     * @param StatementInterface[] $children
     *
     * @return $this
     */
    public function setChildren($children);

    /**
     * @return string|null
     */
    public function getParentId();

    /**
     * @return ArrayCollection
     */
    public function getChildren();

    /**
     * @return StatementInterface
     */
    public function getOriginal();

    /**
     * @param StatementInterface $original
     */
    public function setOriginal($original);

    public function getOriginalId(): ?string;

    /**
     * Set priority.
     *
     * @param string $priority
     */
    public function setPriority($priority): StatementInterface;

    /**
     * Get priority.
     */
    public function getPriority(): string;

    /**
     * Get prioritySort.
     *
     * Rewrites emptystrings with "zzz" in order to move them last
     * in sorted elasticsearch lists.
     *
     * @return string
     */
    public function getPrioritySort();


    /**
     * Set externId.
     *
     * @param string $externId
     */
    public function setExternId($externId): StatementInterface;

    public function getExternId(): string;

    public function getInternId(): ?string;

    /**
     * @param string $internId
     */
    public function setInternId($internId): StatementInterface;

    /**
     * Set user.
     *
     * @param UserInterface $user
     */
    public function setUser($user): StatementInterface;

    /**
     * Get user.
     *
     * @return UserInterface
     */
    public function getUser();

    /**
     * @return string|null
     */
    public function getUserId();

    /**
     * Returns the name of the author!
     *
     * @return string
     */
    public function getUserName();

    /**
     * Set oId.
     *
     * @param OrgaInterface $organisation
     */
    public function setOrganisation($organisation): StatementInterface;

    /**
     * Get Organisation.
     *
     * Return value might somehow even be empty string
     *
     * @return OrgaInterface|string|null
     */
    public function getOrganisation();

    /**
     * Get Name of related Organisation.
     */
    public function getOrganisationName(): ?string;

    /**
     * All ways to create a statement as citizen, will lead to a related citizen organisation.
     * Therefore, if there is a related organisation and is the related organisation is the
     * default citizen organisation, this statement was submitted and authored by an citizen.
     */
    public function isSubmittedByCitizen(): bool;

    /**
     * All ways to create a statement as citizen, will lead to a related citizen organisation.
     * Therefore, if there is no related organisation or the related organisation is not the
     * default citizen organisation, this statement was submitted and authored by an organisation.
     */
    public function isSubmittedByOrganisation(): bool;

    /**
     * Follows the same logic as used in isSubmittedByOrganisation().
     */
    public function isAuthoredByOrganisation(): bool;

    /**
     * Follows the same logic as used in isSubmittedByCitizen().
     */
    public function isAuthoredByCitizen(): bool;

    /**
     * Get organisation ID.
     */
    public function getOId(): ?string;

    /**
     * Get Organisation Name.
     *
     * @return string
     */
    public function getOName();

    /**
     * Get Department Name.
     *
     * @return string
     */
    public function getDName();

    /**
     * Set procedure.
     *
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure): StatementInterface;

    public function getProcedure(): ProcedureInterface;

    /**
     * Returns the ID of the related procedure.
     *
     * @return string
     */
    public function getProcedureId();

    /**
     * Get pId.
     *
     * @return string
     */
    public function getPId();

    /**
     * Set phase.
     *
     * @param string $phase
     */
    public function setPhase($phase): StatementInterface;

    /**
     * Get phase.
     */
    public function getPhase(): string;

    /**
     * Set status.
     *
     * @param string $status
     */
    public function setStatus($status): StatementInterface;

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set Created.
     *
     * @param DateTime $created
     */
    public function setCreated($created): StatementInterface;

    /**
     * Get Created.
     *
     * @return DateTime
     */
    public function getCreated();

    /**
     * Set modified.
     *
     * @param DateTime $modified
     */
    public function setModified($modified): StatementInterface;

    /**
     * Get modified.
     *
     * @return DateTime
     */
    public function getModified();

    /**
     * Set send.
     *
     * @param DateTime $send
     */
    public function setSend($send): StatementInterface;

    /**
     * Get send.
     *
     * @return DateTime
     */
    public function getSend();

    /**
     * Set sentAssessmentDate.
     *
     * @param DateTime $sentAssessmentDate
     */
    public function setSentAssessmentDate($sentAssessmentDate): StatementInterface;

    /**
     * Get sentAssessmentDate.
     *
     * @return DateTime
     */
    public function getSentAssessmentDate();

    /**
     * Set submit.
     *
     * @param DateTime $submit
     */
    public function setSubmit($submit): StatementInterface;

    /**
     * Get submit as Timestamp.
     */
    public function getSubmit(): int;

    /**
     * Get submit as Object.
     *
     * @return DateTime
     */
    public function getSubmitObject();

    /**
     * @return string
     */
    public function getSubmitDateString();

    /**
     * Set deletedDate.
     *
     * @param DateTime $deletedDate
     */
    public function setDeletedDate($deletedDate): StatementInterface;

    /**
     * @return array<int,string>
     */
    public function getFiles(): array;

    /**
     * @return array<int,string>
     */
    public function getFileNames(): array;

    /**
     * Attention. FileStrings are needed, which you can get from the FileContainerRepository.
     * One could implement magic function __toString() in File that returns it.
     * May typehint string will do it's thing.
     *
     * @param array $files
     */
    public function setFiles($files);

    /**
     * Returns a text that describes in the name of whom this
     * statement is going to be submitted.
     *
     * @return string
     */
    public function getRepresents();

    /**
     * Sets a text that describes in the name of whom this
     * statement is going to be submitted.
     *
     * @param string $represents
     */
    public function setRepresents($represents): StatementInterface;

    /**
     * Returns wheter the validity and/or authority
     * of this statements representative has been checked
     * by a planner.
     */
    public function getRepresentationCheck(): int;

    /**
     * Sets wheter the validity and/or authority
     * of this statements representative has been checked
     * by a planner.
     *
     * @param bool $checked
     */
    public function setRepresentationCheck($checked): StatementInterface;

    /**
     * Get deletedDate.
     *
     * @return DateTime
     */
    public function getDeletedDate();

    /**
     * Set Deleted.
     *
     * @param bool $deleted
     */
    public function setDeleted($deleted): StatementInterface;

    /**
     * Get deleted.
     */
    public function getDeleted(): bool;

    /**
     * Is deleted.
     */
    public function isDeleted(): bool;

    /**
     * Set negativeStatement.
     *
     * @param bool $negativeStatement
     */
    public function setNegativeStatement($negativeStatement): StatementInterface;

    /**
     * Get negativeStatement.
     */
    public function getNegativeStatement(): bool;

    /**
     * Set sentAssessment.
     *
     * @param bool $sentAssessment
     */
    public function setSentAssessment($sentAssessment): StatementInterface;

    /**
     * Get sentAssessment.
     */
    public function getSentAssessment(): bool;

    /**
     * Get publicAllowed.
     * Convenience getter method.
     *
     **/
    public function getPublicAllowed(): bool;

    /**
     * Set publicUseName.
     *
     * @param bool $publicUseName
     */
    public function setPublicUseName($publicUseName): StatementInterface;

    /**
     * Get publicUseName.
     */
    public function getPublicUseName(): bool;

    /**
     * Set publicVerified.
     *
     * @param string $publicVerified
     */
    public function setPublicVerified($publicVerified): StatementInterface;

    /**
     * Get publicVerified.
     */
    public function getPublicVerified(): string;

    /**
     * Get translation key of property publicVerified.
     */
    public function getPublicVerifiedTranslation(): string;

    /**
     * Set publicStatement.
     *
     * @param string $publicStatement
     */
    public function setPublicStatement($publicStatement): StatementInterface;

    /**
     * Get publicStatement.
     */
    public function getPublicStatement(): string;

    /**
     * Set toSendPerMail.
     *
     * @param bool $toSendPerMail
     */
    public function setToSendPerMail($toSendPerMail): StatementInterface;

    /**
     * Get toSendPerMail.
     */
    public function getToSendPerMail(): bool;

    /**
     * Set title.
     *
     * @param string $title
     */
    public function setTitle($title): StatementInterface;

    /**
     * Get title.
     */
    public function getTitle(): string;

    /**
     * Set text.
     *
     * @param string $text
     */
    public function setText($text): StatementInterface;

    /**
     * Get text.
     */
    public function getText(): string;

    public function getTextShort(): string;

    /**
     * Set recommendation.
     *
     * @param string $recommendation
     */
    public function setRecommendation($recommendation): StatementInterface;

    /**
     * Get recommendation.
     */
    public function getRecommendation(): string;

    /**
     * @param string $additionalRecommendationParagraphText
     */
    public function addRecommendationParagraph($additionalRecommendationParagraphText): StatementInterface;

    public function getRecommendationShort(): string;

    /**
     * Set memo.
     *
     * @param string $memo
     */
    public function setMemo($memo): StatementInterface;

    /**
     * Get memo.
     */
    public function getMemo(): string;

    /**
     * Set feedback.
     *
     * @param string $feedback
     */
    public function setFeedback($feedback): StatementInterface;

    /**
     * Get feedback.
     */
    public function getFeedback(): string;

    /**
     * Set reasonParagraph.
     *
     * @param string $reasonParagraph
     */
    public function setReasonParagraph($reasonParagraph): StatementInterface;

    /**
     * @return Collection<int, StatementAttachmentInterface>
     */
    public function getAttachments(): Collection;

    /**
     * @param Collection<int, StatementAttachmentInterface> $attachments
     */
    public function setAttachments(Collection $attachments): void;

    public function addAttachment(StatementAttachmentInterface $attachment): self;

    /**
     * Get reasonParagraph.
     */
    public function getReasonParagraph(): string;

    /**
     * Set planningDocument.
     *
     * @param string $planningDocument
     */
    public function setPlanningDocument($planningDocument): StatementInterface;

    /**
     * Get planningDocument.
     *
     * @return string
     */
    public function getPlanningDocument();

    /**
     * Set mapFile.
     *
     * @param string $mapFile
     */
    public function setMapFile($mapFile): StatementInterface;

    /**
     * Get mapFile.
     *
     * @return string|null In the database beside an actual map file string in the
     *                     form of 'Map_DRAFT_STATEMENT_UUID.png:FILE_UUID' the
     *                     value may be null or an empty string as well.
     */
    public function getMapFile(): ?string;

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
     * @return string|null returns the title of the parent document (the document of the document version)
     */
    public function getDocumentParentTitle();

    /**
     * @return SingleDocumentVersionInterface|null
     */
    public function getDocument();

    /**
     * @param SingleDocumentVersionInterface|null $documentVersion
     */
    public function setDocument($documentVersion);

    /**
     * Get documentId.
     *
     * @return string
     */
    public function getDocumentId();

    /**
     * Get documentTitle.
     *
     * @return string
     */
    public function getDocumentTitle();

    /**
     * Get documentHash.
     *
     * @return string
     */
    public function getDocumentHash();

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
     * Set polygon.
     *
     * @param string $polygon
     *
     * @return StatementInterface
     */
    public function setPolygon($polygon);

    /**
     * Get polygon.
     *
     * @return string
     */
    public function getPolygon();

    /**
     * Set DraftStatement.
     *
     * @param DraftStatementInterface $draftStatement
     *
     * @return StatementInterface
     */
    public function setDraftStatement($draftStatement);

    /**
     * Get DraftStatement.
     *
     * @return DraftStatementInterface
     */
    public function getDraftStatement();

    /**
     * Get DraftStatement Id.
     *
     * @return string
     */
    public function getDraftStatementId();

    public function getMeta(): StatementMetaInterface;

    public function setMeta(StatementMetaInterface $meta): void;

    /**
     * @return ArrayCollection
     */
    public function getStatementAttributes();

    /**
     * @return StatementVersionFieldInterface
     */
    public function getVersion();

    /**
     * @param StatementVersionFieldInterface $version
     */
    public function setVersion($version);

    /**
     * @return Collection<int,StatementVoteInterface>
     */
    public function getVotes();

    /**
     * To ensure correct handling of votes, use repository method instead using this method directly.
     * The repository method, can handle a list of given votes and decide which of the given votes
     * have to be created or updated and which of the current votes have to be deleted.
     *
     * @param StatementVoteInterface[] $votes
     */
    public function setVotes($votes);

    /**
     * Returns number of votes for easier use in ES.
     */
    public function getVotesNum(): int;

    /**
     * Returns number of likes for easier use in ES.
     *
     * @return int
     */
    public function getLikesNum();

    /**
     * @return StatementLikeInterface[]
     */
    public function getLikes();

    /**
     * Set Tags.
     *
     * @param TagInterface[] $tags
     */
    public function setTags($tags): StatementInterface;

    /**
     * Add Tag.
     *
     * @return bool - true, if the given tag was successful added to this statement
     *              and this statement was successful added to the given tag, otherwise false
     */
    public function addTag(TagInterface $tag): bool;

    /**
     * @param array<int, TagInterface> $tags
     */
    public function addTags(array $tags): void;

    /**
     * @param array<int, TagInterface> $tags
     */
    public function removeTags(array $tags): void;

    /**
     * Remove Tag.
     *
     * @return StatementInterface
     */
    public function removeTag(TagInterface $tag);

    /**
     * Get Tags.
     */
    public function getTags(): Collection;

    /**
     * Returns the names of all Tags assigned to this Statement.
     *
     * @return array()
     */
    public function getTagNames(): array;

    /**
     * Returns the Ids of all Tags assigned to this Statement.
     *
     * @return array()
     */
    public function getTagIds(): array;

    /**
     * Returns the names of all Topics that are related with this Statement.
     *
     * @return array()
     */
    public function getTopicNames();

    /**
     * VoteStatskanzlei
     * Get the StK-vote of this statement.
     *
     * @return string
     */
    public function getVoteStk();

    /**
     * Set the StK-vote of this statement
     * Kind of vote advice.
     *
     * @param string|null $voteStk
     *
     * @throws Exception
     */
    public function setVoteStk($voteStk): StatementInterface;

    /**
     * VotePlanungs...behörde?!/büro
     * Get the planners vote of this statement.
     */
    public function getVotePla(): ?string;

    /**
     * Set the planners vote of this statement.
     *
     * @param string|null $votePla
     *
     * @throws Exception
     */
    public function setVotePla($votePla): StatementInterface;

    public function getAllowedVoteValues(): array;

    /**
     * @return string
     */
    public function getSubmitType();

    /**
     * @param string $submitType
     */
    public function setSubmitType($submitType);

    /**
     * This field ist transformed during populate to Elasticsearch and Doctrine fetch.
     */
    public function getSubmitTypeTranslated(): string;

    public function setSubmitTypeTranslated(string $submitTypeTranslated): StatementInterface;

    /**
     * @return UserInterface|null
     */
    public function getAssignee();

    public function getAssigneeId(): ?string;

    /**
     * @param UserInterface|null $assignee
     */
    public function setAssignee($assignee);

    /**
     * Returns the cluster which this Statement belongs to.
     *
     * @return ArrayCollection
     */
    public function getCluster();

    /**
     * Add this Statement to a cluster of Statements
     * If one of the given statements already a member of a cluster, this membership will be replaced!
     *
     * @param StatementInterface[] $statements
     *
     * @return $this
     */
    public function setCluster($statements);

    /**
     * @return StatementInterface
     */
    public function getHeadStatement();

    /**
     * @return string|null
     */
    public function getHeadStatementId();

    /**
     * @param StatementInterface $headStatement
     *
     * @return $this
     */
    public function setHeadStatement($headStatement);

    /**
     * Determines if this Statement is the head of a cluster.
     *
     * @return bool true if this Statement is the head of a cluster, otherwise false
     */
    public function hasClusterMember();

    /**
     * Determines if this Statement belongs to a cluster.
     *
     * @return bool true if this Statement belongs to a cluster, otherwise false.s
     */
    public function isInCluster(): bool;

    /**
     * Add a Statement to the cluster of this Statement.
     *
     * @param StatementInterface $statement
     *
     * @return StatementInterface|bool - false if this statement not a head of a cluster, otherwise this statement
     */
    public function addStatement($statement);

    /**
     * @return int number of Statements belongs to the cluster
     */
    public function getNumberOfStatementsInCluster();

    /**
     * Removes the given Statement from his cluster if it is actually a element of a cluster.
     * Also set the headStatement of the given Statement to null.
     *
     * @return bool - true if the given Statement is a element of a cluster
     *              and was successfully removed, otherwise false
     */
    public function removeClusterElement(StatementInterface $statementToRemove);

    /**
     * Removes this Statement from his cluster if it is actually a element of a cluster.
     * Also set the headStatement if this Statement to null.
     *
     * @return bool - true if the given Statement is a element of a cluster
     *              and was successfully removed, otherwise false
     */
    public function detachFromCluster();

    /**
     * Load Authored Date from MetaData as Timestamp.
     *
     * @return int - Timestamp
     */
    public function getAuthoredDate();

    /**
     * @return string
     */
    public function getAuthoredDateString();

    /**
     * Yields the type of this statement.
     *
     * Returns wheter the statement is a regular statement ('N'),
     * A cluster ('G')
     * Or a manually entered statement ('M')
     */
    public function getType(): string;
    public function isManual(): bool;

    /**
     * @param bool $isManual
     */
    public function setManual($isManual = true);

    public function isOriginal(): bool;

    /**
     * @return int
     */
    public function getNumberOfAnonymVotes();

    /**
     * @param int $numberOfAnonymVotes
     */
    public function setNumberOfAnonymVotes($numberOfAnonymVotes);

    public function isClusterStatement(): bool;

    /**
     * Because of headStatements are only used as container and will be deleted on resolving a cluster,
     * there is no need to set this flag to false.
     *
     * @param bool $isCluster
     */
    public function setClusterStatement($isCluster): StatementInterface;

    public function getAuthorName(): string;
    /**
     * @return string|null
     */
    public function getAuthorId();

    /**
     * @return UserInterface|null
     */
    public function getAuthor();

    public function getOrgaPostalCode(): string;

    public function getOrgaCity(): string;

    public function getOrgaStreet(): string;

    /**
     * @return string|null
     */
    public function getOrgaEmail();

    public function setOrgaEmail(string $emailAddress): self;

    public function getOrgaPhoneNumber(): string;

    /**
     * @return ProcedureInterface|null
     */
    public function getMovedToProcedure();

    /**
     * @param StatementInterface|null $movedStatement
     */
    public function setMovedStatement($movedStatement);

    /**
     * @return StatementInterface|null
     */
    public function getMovedStatement();

    /**
     * @return string|null
     */
    public function getMovedStatementId();

    public function isPlaceholder(): bool;

    public function wasMoved(): bool;

    /**
     * @return StatementInterface|null
     */
    public function getPlaceholderStatement();

    /**
     * @param StatementInterface|null $placeholderStatement
     */
    public function setPlaceholderStatement($placeholderStatement);

    /**
     * @return ProcedureInterface|null
     */
    public function getMovedFromProcedure();

    /**
     * @return string|null
     */
    public function getMovedFromProcedureId();

    /**
     * @return string|null
     */
    public function getMovedFromProcedureName();

    /**
     * @return string|null
     */
    public function getMovedToProcedureId();

    public function getMovedToProcedureName(): ?string;

    /**
     * @return string|null
     */
    public function getFormerExternId();

    /**
     * @return string|null
     */
    public function getDocumentParentId();

    /**
     * @return string|null
     */
    public function getProcedureOwningOrgaId();

    /**
     * Determines if this statement was created by an institution.
     * <p>
     * This is the case if the 'manual' field is set to false and the 'publicStatement' field is set to {@link INTERNAL}
     * as manual statements are created by planners and statements directly created by citizens are always {@link EXTERNAL}.
     */
    public function isCreatedByInvitableInstitution(): bool;

    public function isCreatedByCitizen(): bool;

    public function isPlannerCreatedCitizenStatement(): bool;

    public function isPlannerCreatedInvitableInstitutionStatement(): bool;

    /**
     * Get the email address used to submit this statement.
     */
    public function getSubmitterEmailAddress(): ?string;

    /**
     * Attempts to reverse the logic in {@link StatementInterface::getSubmitterEmailAddress()}.
     */
    public function setSubmitterEmailAddress(string $emailAddress): self;

    public function getName(): string;

    /**
     * @param string|null $name
     */
    public function setName($name);

    /**
     * Determines if this statement is the copy of another (non-original) statement.
     */
    public function isCopy(): bool;

    /**
     * Returns the Id of the submitter of this statement, if existing.
     * Will return null, in case of submitter unregistered User (or dummy user User::ANONYMOUS_USER_ID).
     *
     * @return string|null
     */
    public function getSubmitterId();
    /**
     * Returns the Name of the submitter of this statement, if existing.
     * Will return null, in case of submitter unregistered User (or dummy user User::ANONYMOUS_USER_ID).
     */
    public function getSubmitterName(): ?string;

    public function isSubmitter(string $userId): bool;

    public function isAuthor(string $userId): bool;

    public function setReplied(bool $replied): void;

    public function isReplied(): bool;

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

    public function setDraftsListJson(string $json): void;

    /**
     * @return string May be empty if none was set yet
     */
    public function getDraftsListJson(): string;

    /**
     * @return Collection<int, SegmentInterface>
     */
    public function getSegmentsOfStatement(): Collection;

    /**
     * @param Collection<int, SegmentInterface> $segmentsOfStatement
     */
    public function setSegmentsOfStatement(Collection $segmentsOfStatement): void;

    public function isAlreadySegmented(): bool;

    /**
     * Returns true if the Entity is implementing a Segment.
     */
    public function isSegment(): bool;

    /**
     * @return Collection<int, OriginalStatementAnonymizationInterface>
     */
    public function getAnonymizations(): Collection;

    /**
     * @param Collection<int, OriginalStatementAnonymizationInterface> $anonymizations
     */
    public function setAnonymizations(Collection $anonymizations): void;

    /**
     * @return bool True if this statement has at least one {@link OriginalStatementAnonymizationInterface}
     *              entry in which the submitter or author data were deleted from the meta data.
     *              False otherwise. This will not take author/submitter data anonymizations in
     *              the statement text into account.
     */
    public function isSubmitterAndAuthorMetaDataAnonymized(): bool;

    /**
     * @return bool True if this statement has at least one {@link OriginalStatementAnonymizationInterface}
     *              entry in which text passages in {@link text} were anonymized. False
     *              otherwise.
     */
    public function isTextPassagesAnonymized(): bool;

    /**
     * @return bool True if this statement has at least one {@link OriginalStatementAnonymizationInterface}
     *              entry in which attachments were deleted. False otherwise.
     */
    public function isAttachmentsDeleted(): bool;

    /**
     * Returns the Pdf the Statement was created from or null if there is none.
     */
    public function getOriginalFile(): ?FileInterface;

    public function hasDefaultGuestUser(): bool;

    public function getSubmitterPhoneNumber(): string;

    /**
     * @return Collection<int, ProcedurePersonInterface>
     */
    public function getSimilarStatementSubmitters(): Collection;

    /**
     * @param Collection<int, ProcedurePersonInterface> $similarStatementSubmitters
     */
    public function setSimilarStatementSubmitters(Collection $similarStatementSubmitters): StatementInterface;

    public function isAnonymous(): bool;

    public function setAnonymous(bool $anonymous): StatementInterface;

    public function removeSimilarStatementSubmitter(ProcedurePersonInterface $procedurePerson): void;

    /**
     * TODO: move out of contract and core
     */
    public function getSegmentationPiRetries(): int;

    /**
     * TODO: move out of contract and core
     */
    public function incrementSegmentationPiRetries(): void;
}
