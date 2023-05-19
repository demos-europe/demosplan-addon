<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ExportFieldsConfigurationInterface extends UuidEntityInterface
{
    public function isIdExportable(): bool;

    public function setIdExportable(bool $idExportable): void;
    public function isStatementNameExportable(): bool;

    public function setStatementNameExportable(bool $statementNameExportable): void;

    public function isCreationDateExportable(): bool;

    public function setCreationDateExportable(bool $creationDateExportable): void;

    public function isProcedureNameExportable(): bool;

    public function setProcedureNameExportable(bool $procedureNameExportable): void;

    public function isProcedurePhaseExportable(): bool;

    public function setProcedurePhaseExportable(bool $procedurePhaseExportable): void;

    public function isVotesNumExportable(): bool;

    public function setVotesNumExportable(bool $votesNumExportable): void;

    public function isUserStateExportable(): bool;

    public function setUserStateExportable(bool $userStateExportable): void;

    public function isUserGroupExportable(): bool;

    public function setUserGroupExportable(bool $userGroupExportable): void;

    public function isUserOrganisationExportable(): bool;

    public function setUserOrganisationExportable(bool $userOrganisationExportable): void;

    public function isUserPositionExportable(): bool;

    public function setUserPositionExportable(bool $userPositionExportable): void;

    public function isInstitutionExportable(): bool;

    public function setInstitutionExportable(bool $institutionExportable): void;

    public function isPublicParticipationExportable(): bool;

    public function setPublicParticipationExportable(bool $publicParticipationExportable): void;

    public function isOrgaNameExportable(): bool;

    public function setOrgaNameExportable(bool $orgaNameExportable): void;

    public function isDepartmentNameExportable(): bool;

    public function setDepartmentNameExportable(bool $departmentNameExportable): void;

    public function isSubmitterNameExportable(): bool;

    public function setSubmitterNameExportable(bool $submitterNameExportable): void;

    public function isShowInPublicAreaExportable(): bool;

    public function setShowInPublicAreaExportable(bool $showInPublicAreaExportable): void;

    public function isDocumentExportable(): bool;

    public function setDocumentExportable(bool $documentExportable): void;

    public function isParagraphExportable(): bool;

    public function setParagraphExportable(bool $paragraphExportable): void;

    public function isFilesExportable(): bool;

    public function setFilesExportable(bool $filesExportable): void;

    public function isAttachmentsExportable(): bool;

    public function setAttachmentsExportable(bool $attachmentsExportable): void;

    public function isPriorityExportable(): bool;

    public function setPriorityExportable(bool $priorityExportable): void;

    public function isEmailExportable(): bool;

    public function setEmailExportable(bool $emailExportable): void;

    public function isPhoneNumberExportable(): bool;

    public function setPhoneNumberExportable(bool $phoneNumberExportable): void;

    public function isStreetExportable(): bool;

    public function setStreetExportable(bool $streetExportable): void;

    public function isStreetNumberExportable(): bool;

    public function setStreetNumberExportable(bool $streetNumberExportable): void;

    public function isPostalCodeExportable(): bool;

    public function setPostalCodeExportable(bool $postalCodeExportable): void;

    public function isCityExportable(): bool;

    public function setCityExportable(bool $cityExportable): void;

    public function isInstitutionOrCitizenExportable(): bool;

    public function setInstitutionOrCitizenExportable(bool $institutionOrCitizenExportable): void;

    public function getId(): ?string;

    public function getProcedure(): ProcedureInterface;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;

    public function initializeAllProperties(bool $value): void;
}