<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface DraftStatementInterface extends UuidEntityInterface
{
    public const INTERNAL = 'internal';

    public const EXTERNAL = 'external';


    /**
     * @deprecated use {@link DraftStatementInterface::getId()} instead
     */
    public function getIdent(): ?string;

    /**
     * Set procedure.
     *
     * @param ProcedureInterface $procedure
     *
     * @return DraftStatementInterface
     */
    public function setProcedure($procedure);

    /**
     * Get procedure.
     *
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * Get pId.
     *
     * @return string
     */
    public function getPId();

    /**
     * Get ProcedureId.
     *
     * @return string
     */
    public function getProcedureId();

    /**
     * Set number.
     *
     * @param int $number
     *
     * @return DraftStatementInterface
     */
    public function setNumber($number);

    /**
     * Get number.
     *
     * @return int
     */
    public function getNumber();

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return DraftStatementInterface
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * Get text.
     *
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     */
    public function setText($text);

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
     * Get elementId.
     *
     * @return string
     */
    public function getElementId();

    /**
     * Get elementTitle.
     *
     * @return string
     */
    public function getElementTitle();

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
     * @return DraftStatementInterface
     */
    public function setPolygon($polygon);

    /**
     * Get polygon.
     *
     * @return string
     */
    public function getPolygon();

    /**
     * Set file.
     *
     * @param string $file
     *
     * @return DraftStatementInterface
     */
    public function setFile($file);

    /**
     * Get file.
     *
     * @return string
     */
    public function getFile();

    /**
     * Return FileStrings to keep method backwards compatible.
     *
     * @return array<int,string|null>
     */
    public function getFiles(): array;

    public function addFile(DraftStatementFileInterface $draftStatementFile): self;

    public function removeFile(DraftStatementFileInterface $draftStatementFile): self;

    public function removeFileByFileId(string $fileId): self;

    /**
     * Set mapFile.
     *
     * @param string $mapFile
     *
     * @return DraftStatementInterface
     */
    public function setMapFile($mapFile);

    /**
     * Get mapFile.
     *
     * @return string
     */
    public function getMapFile();

    /**
     * Set oId.
     *
     * @param OrgaInterface $organisation
     *
     * @return DraftStatementInterface
     */
    public function setOrganisation($organisation);

    public function getOrganisation(): OrgaInterface;

    /**
     * Get Organisation Id.
     *
     * @return string
     */
    public function getOId();

    /**
     * Get Organisation GatewayName.
     *
     * @return string
     */
    public function getOGatewayName();

    /**
     * Set oName.
     *
     * @param string $oName
     *
     * @return DraftStatementInterface
     */
    public function setOName($oName);

    /**
     * Get oName.
     *
     * @return string
     */
    public function getOName();

    /**
     * Set dName.
     *
     * @param string $dName
     *
     * @return DraftStatementInterface
     */
    public function setDName($dName);

    /**
     * Get dName.
     *
     * @return string
     */
    public function getDName();

    /**
     * @return mixed|DepartmentInterface
     */
    public function getDepartment();

    /**
     * @param DepartmentInterface $department
     */
    public function setDepartment($department);

    public function getDId();

    /**
     * Set user.
     *
     * @param UserInterface $user
     *
     * @return DraftStatementInterface
     */
    public function setUser($user);

    /**
     * Get user.
     *
     * @return UserInterface
     */
    public function getUser();

    /**
     * @return string
     */
    public function getUId();

    /**
     * Set uName.
     *
     * @param string $uName
     *
     * @return DraftStatementInterface
     */
    public function setUName($uName);

    /**
     * Get uName.
     *
     * @return string
     */
    public function getUName();

    /**
     * Set uStreet.
     *
     * @param string $uStreet
     *
     * @return DraftStatementInterface
     */
    public function setUStreet($uStreet);

    /**
     * Get uStreet.
     *
     * @return string
     */
    public function getUStreet();

    /**
     * @return mixed
     */
    public function getCategories();

    /**
     * @param mixed $categories
     */
    public function setCategories($categories);

    /**
     * Reset Categories.
     */
    public function clearCategories();

    /**
     * Set uPostalCode.
     *
     * @param string $uPostalCode
     *
     * @return DraftStatementInterface
     */
    public function setUPostalCode($uPostalCode);

    /**
     * Get uPostalCode.
     *
     * @return string
     */
    public function getUPostalCode();

    /**
     * Set uCity.
     *
     * @param string $uCity
     *
     * @return DraftStatementInterface
     */
    public function setUCity($uCity);

    /**
     * Get uCity.
     *
     * @return string
     */
    public function getUCity();

    /**
     * Set uEmail.
     *
     * @param string $uEmail
     *
     * @return DraftStatementInterface
     */
    public function setUEmail($uEmail);

    /**
     * Get uEmail.
     *
     * @return string
     */
    public function getUEmail();

    public function setUFeedback(bool $uFeedback): self;

    public function getUFeedback(): bool;

    /**
     * Set feedback.
     *
     * @param string $feedback
     *
     * @return DraftStatementInterface
     */
    public function setFeedback($feedback);

    /**
     * Get feedback.
     *
     * @return string
     */
    public function getFeedback();

    /**
     * Set externId.
     *
     * @param string $externId
     *
     * @return DraftStatementInterface
     */
    public function setExternId($externId);

    /**
     * Get externId.
     *
     * @return string
     */
    public function getExternId();

    /**
     * Set rejectedReason.
     *
     * @param string $rejectedReason
     *
     * @return DraftStatementInterface
     */
    public function setRejectedReason($rejectedReason);

    /**
     * Get rejectedReason.
     *
     * @return string
     */
    public function getRejectedReason();

    /**
     * Set negativ.
     *
     * @param bool $negativ
     *
     * @return DraftStatementInterface
     */
    public function setNegativ($negativ);

    /**
     * Get negativ.
     *
     * @return bool
     */
    public function getNegativ();

    /**
     * Set submitted.
     *
     * @param bool $submitted
     *
     * @return DraftStatementInterface
     */
    public function setSubmitted($submitted);

    /**
     * Get submitted.
     *
     * @return bool
     */
    public function isSubmitted();

    /**
     * Set released.
     *
     * @param bool $released
     *
     * @return DraftStatementInterface
     */
    public function setReleased($released);

    /**
     * Get released.
     *
     * @return bool
     */
    public function isReleased();

    /**
     * Set showToAll.
     *
     * @param bool $showToAll
     *
     * @return DraftStatementInterface
     */
    public function setShowToAll($showToAll);

    /**
     * Get showToAll.
     *
     * @return bool
     */
    public function isShowToAll();

    /**
     * Set deleted.
     *
     * @param bool $deleted
     *
     * @return DraftStatementInterface
     */
    public function setDeleted($deleted);

    /**
     * Get deleted.
     *
     * @return bool
     */
    public function isDeleted();

    /**
     * Tells Elasticsearch whether Entity should be indexed.
     *
     * @return bool
     */
    public function shouldBeIndexed();

    /**
     * Set rejected.
     *
     * @param bool $rejected
     *
     * @return DraftStatementInterface
     */
    public function setRejected($rejected);

    /**
     * Get rejected.
     *
     * @return bool
     */
    public function isRejected();

    /**
     * Set publicAllowed.
     *
     * @param bool $publicAllowed
     *
     * @return DraftStatementInterface
     */
    public function setPublicAllowed($publicAllowed);

    public function isPublicAllowed(): bool;

    /**
     * Set publicUseName.
     *
     * @param bool $publicUseName
     *
     * @return DraftStatementInterface
     */
    public function setPublicUseName($publicUseName);

    /**
     * Get publicUseName.
     *
     * @return bool
     */
    public function isPublicUseName();

    /**
     * Set publicDraftStatement.
     *
     * @param string $publicDraftStatement
     *
     * @return DraftStatementInterface
     */
    public function setPublicDraftStatement($publicDraftStatement);

    /**
     * Get publicDraftStatement.
     *
     * @return string
     */
    public function getPublicDraftStatement();

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
     *
     * @return DraftStatementInterface
     */
    public function setRepresents($represents);

    /**
     * Set phase.
     *
     * @param string $phase
     *
     * @return DraftStatementInterface
     */
    public function setPhase($phase);

    /**
     * Get phase.
     *
     * @return string
     */
    public function getPhase();

    /**
     * Set createdDate.
     *
     * @param DateTime $createdDate
     *
     * @return DraftStatementInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * Get createdDate.
     *
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * Set deletedDate.
     *
     * @param DateTime $deletedDate
     *
     * @return DraftStatementInterface
     */
    public function setDeletedDate($deletedDate);

    /**
     * Get deletedDate.
     *
     * @return DateTime
     */
    public function getDeletedDate();

    /**
     * Set lastModifiedDate.
     *
     * @param DateTime $lastModifiedDate
     *
     * @return DraftStatementInterface
     */
    public function setLastModifiedDate($lastModifiedDate);

    /**
     * Get lastModifiedDate.
     *
     * @return DateTime
     */
    public function getLastModifiedDate();

    /**
     * Set submittedDate.
     *
     * @param DateTime $submittedDate
     *
     * @return DraftStatementInterface
     */
    public function setSubmittedDate($submittedDate);

    /**
     * Get submittedDate.
     *
     * @return DateTime
     */
    public function getSubmittedDate();

    /**
     * Set releasedDate.
     *
     * @param DateTime $releasedDate
     *
     * @return DraftStatementInterface
     */
    public function setReleasedDate($releasedDate);

    /**
     * Get releasedDate.
     *
     * @return DateTime
     */
    public function getReleasedDate();
    /**
     * Set rejectedDate.
     *
     * @param DateTime $rejectedDate
     *
     * @return DraftStatementInterface
     */
    public function setRejectedDate($rejectedDate);

    /**
     * Get rejectedDate.
     *
     * @return DateTime
     */
    public function getRejectedDate();

    /**
     * Get statementAttributes.
     *
     * @return StatementAttributeInterface[]
     */
    public function getStatementAttributes();

    /**
     * Reset statementAttributes.
     */
    public function clearStatementAttributes();

    /**
     * Get statementAttributes of one type.
     *
     * @param string $type
     *
     * @return array|string
     */
    public function getStatementAttributesByType($type);

    /**
     * Add StatementAttribute to DraftStatement.
     *
     * @param StatementAttributeInterface $statementAttribute
     */
    public function addStatementAttribute(StatementAttributeInterface $statementAttribute);

    /**
     * Remove StatementAttribute from DraftStatement.
     *
     * @param StatementAttributeInterface $statementAttribute
     */
    public function removeStatementAttribute(StatementAttributeInterface $statementAttribute);

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
     * @return DraftStatementInterface
     */
    public function setMiscDataValue($key, $value);

    /**
     * @return array
     */
    public function getMiscData();

    /**
     * @param string $miscData
     */
    public function setMiscData($miscData);

    public function getHouseNumber(): string;

    public function setHouseNumber(string $houseNumber);

    public function isAnonymous(): bool;

    public function setAnonymous(bool $anonymous): void;
}