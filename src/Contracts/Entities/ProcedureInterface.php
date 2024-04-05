<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

interface ProcedureInterface extends SluggedEntityInterface
{
    public const VALIDATION_GROUP_MANDATORY_PROCEDURE = 'mandatory_procedure';

    public const VALIDATION_GROUP_MANDATORY_PROCEDURE_TEMPLATE = 'mandatory_procedure_template';

    // This validation group is intended ONLY for procedures with all dependent sub-entities,
    // like UiDefinition, FormDefinitions, etc.
    public const VALIDATION_GROUP_MANDATORY_PROCEDURE_ALL_INCLUDED = 'mandatory_procedure_all_included';

    public const VALIDATION_GROUP_DEFAULT = 'Default';

    /**
     * Key used in phases to determine state of participation.
     *
     * @var string
     */
    public const PARTICIPATIONSTATE_KEY = 'participationstate';

    /**
     * Value to define that participation has finished for procedure.
     *
     * @var string
     */
    public const PARTICIPATIONSTATE_FINISHED = 'finished';

    /**
     * Value to define that users may provide an access token to participate.
     *
     * @value string
     */
    public const PARTICIPATIONSTATE_PARTICIPATE_WITH_TOKEN = 'participateWithToken';

    /**
     * Value to define the public participation phase in a Procedure.
     */
    public const PROCEDURE_PARTICIPATION_PHASE = 'participation';

    /**
     * Possible values for procedure permissionsets.
     */
    public const PROCEDURE_PHASE_PERMISSIONSET_HIDDEN = 'hidden';
    public const PROCEDURE_PHASE_PERMISSIONSET_READ = 'read';
    public const PROCEDURE_PHASE_PERMISSIONSET_WRITE = 'write';

    public const MAX_PUBLIC_PARTICIPATION_CONTACT_LENGTH = 2000;
    public const MAX_PUBLIC_DESCRIPTION_LENGTH = 10000;

    /**
     * @return Collection<int,ElementsInterface>
     */
    public function getElements(): Collection;

    /**
     * @param ArrayCollection $elements
     */
    public function setElements($elements);

    public function addElement(ElementsInterface $element): void;

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id);

    /**
     * Set pName.
     *
     * @param string $name
     *
     * @return ProcedureInterface
     */
    public function setName($name);

    public function getName(): string;

    /**
     * Set oName.
     *
     * @param string $orgaName
     *
     * @return ProcedureInterface
     */
    public function setOrgaName($orgaName);

    /**
     * Get oName.
     *
     * @return string
     */
    public function getOrgaName();

    /**
     * @return string|null
     */
    public function getOrgaId();

    public function getOrga(): ?OrgaInterface;

    /**
     * @param OrgaInterface $orga
     *
     * @return $this
     */
    public function setOrga($orga);

    /**
     * Set pDesc.
     *
     * @param string $desc
     *
     * @return ProcedureInterface
     */
    public function setDesc($desc);

    /**
     * Get pDesc.
     *
     * @return string
     */
    public function getDesc();

    /**
     * Set pPhase.
     *
     * @param string $phase
     *
     * @return ProcedureInterface
     */
    public function setPhase($phase);

    public function getPhase(): string;

    public function getPhaseObject(): ProcedurePhaseInterface;

    /**
     * @return string
     */
    public function getPhaseName();

    /**
     * @param string $phaseName
     */
    public function setPhaseName($phaseName);

    public function getPhasePermissionset(): string;

    public function setPhasePermissionset(string $phasePermissionset): ProcedureInterface;

    /**
     * Set pStep.
     *
     * @param string $step
     *
     * @return ProcedureInterface
     */
    public function setStep($step);

    /**
     * Get pStep.
     *
     * @return string
     */
    public function getStep();

    /**
     * Set pLogo.
     *
     * @param string $logo
     *
     * @return ProcedureInterface
     */
    public function setLogo($logo);

    /**
     * Get pLogo.
     *
     * @return string
     */
    public function getLogo();

    /**
     * Set pExternId.
     *
     * @param string $externId
     *
     * @return ProcedureInterface
     */
    public function setExternId($externId);

    /**
     * Get pExternId.
     *
     * @return string
     */
    public function getExternId();

    /**
     * Set pPlisId.
     *
     * @param string $plisId
     *
     * @return ProcedureInterface
     */
    public function setPlisId($plisId);

    /**
     * Get pPlisId.
     *
     * @return string
     */
    public function getPlisId();

    /**
     * Set pClosed.
     *
     * @param bool $closed
     *
     * @return ProcedureInterface
     */
    public function setClosed($closed);

    /**
     * Get pClosed.
     *
     * @return bool
     */
    public function getClosed();

    /**
     * Set deleted.
     *
     * @param bool $deleted
     *
     * @return ProcedureInterface
     */
    public function setDeleted($deleted);

    /**
     * Get Deleted.
     *
     * @return bool
     */
    public function getDeleted();

    /**
     * Is Deleted.
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
     * Set pMaster.
     *
     * @param bool $master
     *
     * @return ProcedureInterface
     */
    public function setMaster($master);

    /**
     * Get pMaster.
     *
     * @return bool
     */
    public function getMaster();

    public function setMasterTemplate(bool $masterTemplate): ProcedureInterface;

    public function isMasterTemplate(): bool;

    /**
     * Set pExternalName.
     *
     * @param string $externalName
     *
     * @return ProcedureInterface
     */
    public function setExternalName($externalName);

    /**
     * Get pExternalName.
     */
    public function getExternalName(): string;

    /**
     * Set pExternalDesc.
     *
     * @param string $externalDesc
     *
     * @return ProcedureInterface
     */
    public function setExternalDesc($externalDesc);

    /**
     * Get pExternalDesc.
     *
     * @return string
     */
    public function getExternalDesc();

    /**
     * Set pPublicParticipation.
     *
     * @param bool $publicParticipation
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipation($publicParticipation);

    /**
     * Get pPublicParticipation.
     *
     * @return bool
     */
    public function getPublicParticipation();

    public function getPublicParticipationPhaseObject(): ProcedurePhaseInterface;

    /**
     * Set pPublicParticipationPhase.
     *
     * @param string $publicParticipationPhase
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipationPhase($publicParticipationPhase);

    public function getPublicParticipationPhase(): string;

    /**
     * @return string
     */
    public function getPublicParticipationPhaseName();

    /**
     * @param string $publicParticipationPhaseName
     */
    public function setPublicParticipationPhaseName($publicParticipationPhaseName);

    public function getPublicParticipationPhasePermissionset(): string;

    public function setPublicParticipationPhasePermissionset(string $publicParticipationPhasePermissionset): ProcedureInterface;

    /**
     * Set pPublicParticipationStep.
     *
     * @param string $publicParticipationStep
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipationStep($publicParticipationStep);

    /**
     * Get pPublicParticipationStep.
     *
     * @return string
     */
    public function getPublicParticipationStep();

    /**
     * Set pPublicParticipationStart.
     *
     * @param DateTime $publicParticipationStartDate
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipationStartDate($publicParticipationStartDate);

    /**
     * Get pPublicParticipationStart.
     *
     * @return DateTime
     */
    public function getPublicParticipationStartDate();

    /**
     * Get publicParticipationStartDate as Timestamp.
     *
     * @return int
     */
    public function getPublicParticipationStartDateTimestamp();

    /**
     * Set pPublicParticipationEnd.
     *
     * @param DateTime $publicParticipationEndDate
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipationEndDate($publicParticipationEndDate);

    /**
     * Get pPublicParticipationEnd.
     *
     * @return DateTime
     */
    public function getPublicParticipationEndDate();

    /**
     * Get pPublicParticipationEnd as Timestamp.
     *
     * @return int
     */
    public function getPublicParticipationEndDateTimestamp();

    /**
     * Get publicParticipationPublicationEnabled.
     *
     * @return bool
     */
    public function getPublicParticipationPublicationEnabled();

    /**
     * Set publicParticipationPublicationEnabled.
     *
     * @param bool $enabled
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipationPublicationEnabled($enabled);

    /**
     * Set pPublicParticipationContact.
     *
     * @param string $publicParticipationContact
     *
     * @return ProcedureInterface
     */
    public function setPublicParticipationContact($publicParticipationContact);

    /**
     * Get pPublicParticipationContact.
     *
     * @return string
     */
    public function getPublicParticipationContact();

    /**
     * Set pLocationName.
     *
     * @param string $locationName
     *
     * @return ProcedureInterface
     */
    public function setLocationName($locationName);

    /**
     * Get pLocationName.
     *
     * @return string
     */
    public function getLocationName();

    /**
     * Set pLocationPostCode.
     *
     * @param string $locationPostCode
     *
     * @return ProcedureInterface
     */
    public function setLocationPostCode($locationPostCode);

    /**
     * Get pLocationPostCode.
     *
     * @return string
     */
    public function getLocationPostCode();

    /**
     * @return string
     */
    public function getCoordinate();

    /**
     * Getter used to populate Elasticsearch.
     */
    public function isParticipationGuestOnly(): bool;

    /**
     * @return string
     */
    public function getPlanningArea();

    /**
     * Set pMunicipalCode.
     *
     * @param string $municipalCode
     *
     * @return ProcedureInterface
     */
    public function setMunicipalCode($municipalCode);

    /**
     * Get pMunicipalCode.
     *
     * @return string
     */
    public function getMunicipalCode();

    public function getArs(): string;

    public function setArs(string $ars): ProcedureInterface;

    /**
     * Set pCreatedDate.
     *
     * @param DateTime $createdDate
     *
     * @return ProcedureInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * Get pCreatedDate.
     *
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * Set pStartDate.
     *
     * @param DateTime $startDate
     *
     * @return ProcedureInterface
     */
    public function setStartDate($startDate);

    /**
     * Get pStartDate.
     *
     * @return DateTime
     */
    public function getStartDate();

    /**
     * Get getStartDate as Timestamp.
     *
     * @return int
     */
    public function getStartDateTimestamp();

    /**
     * Set pEndDate.
     *
     * @param DateTime $endDate
     *
     * @return ProcedureInterface
     */
    public function setEndDate($endDate);

    /**
     * Get pEndDate.
     *
     * @return DateTime
     */
    public function getEndDate();

    /**
     * Get getEndDate as Timestamp.
     *
     * @return int
     */
    public function getEndDateTimestamp();

    /**
     * Set pClosedDate.
     *
     * @param DateTime $closedDate
     *
     * @return ProcedureInterface
     */
    public function setClosedDate($closedDate);

    /**
     * Get pClosedDate.
     *
     * @return DateTime
     */
    public function getClosedDate();

    /**
     * Set pDeletedDate.
     *
     * @param DateTime $deletedDate
     *
     * @return ProcedureInterface
     */
    public function setDeletedDate($deletedDate);

    /**
     * Get pDeletedDate.
     *
     * @return DateTime
     */
    public function getDeletedDate();

    /**
     * Set organisations like plannig agencies
     * Does not contains the owning organisation.
     *
     * @param array $organisation
     *
     * @return ProcedureInterface
     */
    public function setOrganisation($organisation);

    /**
     * Add Organisation to this Procedure.
     *
     * @param OrgaInterface $organisation - Organisation to add
     *
     * @return ProcedureInterface - updated Procedure
     */
    public function addOrganisation(OrgaInterface $organisation);

    /**
     * Detach a Organisation from this Procedure.
     *
     * @return ProcedureInterface
     */
    public function removeOrganisation(OrgaInterface $organisation);

    /**
     * Get o.
     *
     * @return ArrayCollection
     */
    public function getOrganisation();

    /**
     * Warning: This method may lead to performance issues as every organisation is hydrated by
     * doctrine.
     * When possible use {@link ProcedureRepository::getInvitedOrgaIds()} instead which returns the same
     * values.
     *
     * @return string[]
     */
    public function getOrganisationIds();

    /**
     * Is procedure added to Organisation.
     *
     * @param string $orgaId
     *
     * @return bool
     */
    public function hasOrganisation($orgaId);

    public function getSettings(): ProcedureSettingsInterface;

    public function setSettings(ProcedureSettingsInterface $settings): void;

    /**
     * Get all tags that are available in this procedure.
     *
     * @return ArrayCollection<int,TagInterface>
     */
    public function getTags(): ArrayCollection;

    /**
     * Get all topics that are available in this procedure.
     *
     * @return ArrayCollection
     */
    public function getTopics();

    /**
     * @return Collection<int, OrgaInterface>
     */
    public function getPlanningOffices(): Collection;

    /**
     * @param OrgaInterface[] $planningOffices
     */
    public function setPlanningOffices($planningOffices): self;

    /**
     * @return Collection<int, OrgaInterface>
     */
    public function getDataInputOrganisations();

    /**
     * Get dataInputOrgaIds as array.
     *
     * @return string[]
     */
    public function getDataInputOrgaIds();

    /**
     * @param OrgaInterface[] $dataInputOrganisations
     *
     * @return ProcedureInterface
     */
    public function setDataInputOrganisations($dataInputOrganisations);

    public function getPictogram(): ?string;

    /**
     * @return Collection<int, NotificationReceiverInterface>
     */
    public function getNotificationReceivers(): Collection;

    /**
     * @param NotificationReceiverInterface[] $notificationReceivers
     */
    public function setNotificationReceivers(array $notificationReceivers): void;

    /**
     * T8427
     * Allow additional restriction of access to this Procedure.
     * CustomizedAuthorizedUsers.
     *
     * @return Collection<int, UserInterface>
     */
    public function getAuthorizedUsers(): Collection;

    /**
     * @param ArrayCollection|array $authorizedUsers
     */
    public function setAuthorizedUsers($authorizedUsers): self;

    /**
     * @return string[]
     */
    public function getAuthorizedUserNames();

    /**
     * @return string[]
     */
    public function getAuthorizedUserIds(): array;

    /**
     * Warning: This method may lead to performance issues as every organisation is hydrated by
     * doctrine.
     * When possible use {@link ProcedureRepository::getPlanningOfficeIds()} instead which returns the same
     * values.
     *
     * Returns Ids of procedures' planning offices.
     *
     * @return string[]
     */
    public function getPlanningOfficesIds();

    /**
     * @return string
     */
    public function getLegalNotice();

    /**
     * @return string
     */
    public function getAgencyMainEmailAddress();

    /**
     * @param string $agencyMainEmailAddress
     *
     * @return $this
     */
    public function setAgencyMainEmailAddress($agencyMainEmailAddress);
    /**
     * @return Collection<int, EmailAddressInterface>
     */
    public function getAgencyExtraEmailAddresses();

    /**
     * @param Collection<int, EmailAddressInterface> $agencyExtraEmailAddresses
     *
     * @return $this
     */
    public function setAgencyExtraEmailAddresses(Collection $agencyExtraEmailAddresses): ProcedureInterface;

    /**
     * @param Collection<int, EmailAddressInterface> $agencyExtraEmailAddresses
     *
     * @return $this
     */
    public function addAgencyExtraEmailAddresses(Collection $agencyExtraEmailAddresses): ProcedureInterface;

    /**
     * Returns a blankspace separated list with the Orga Slugs (current slug plus the previous ones that the Orga might had).
     *
     * @return string
     */
    public function getOrgaSlugs();

    /**
     * Set pShortUrl.
     *
     * @param string $shortUrl
     *
     * @return ProcedureInterface
     */
    public function setShortUrl($shortUrl);

    /**
     * Get pShortUrl.
     *
     * @return string
     */
    public function getShortUrl();

    public function getSubdomain(): string;

    public function isCustomerMasterBlueprint(): bool;

    /**
     * @return CustomerInterface|null
     */
    public function getCustomer();

    /**
     * @return string|null
     */
    public function getCustomerId();

    /**
     * @param CustomerInterface|null $customer
     */
    public function setCustomer($customer): ProcedureInterface;

    public function getProcedureCategories(): Collection;

    public function setProcedureCategories(array $procedureCategories): void;

    /**
     * Add ProcedureCategory to this Procedure.
     *
     * @return ProcedureInterface - updated Procedure
     */
    public function addProcedureCategory(ProcedureCategoryInterface $procedureCategory): ProcedureInterface;

    /**
     * Is ProcedureCategory attached to Procedure.
     */
    public function hasProcedureCategory(ProcedureCategoryInterface $procedureCategory): bool;

    /**
     * Detach ProcedureCategory from this Procedure.
     */
    public function removeProcedureCategory(ProcedureCategoryInterface $procedureCategory): self;

    /**
     * Detach ProcedureCategories from this Procedure.
     */
    public function removeProcedureCategories(array $procedureCategories): self;

    /**
     * Used for Elasticsearch indexing.
     *
     * @return array
     */
    public function getProcedureCategoryNames();

    /**
     * @return ArrayCollection
     */
    public function getStatements();

    public function setStatements(ArrayCollection $statements): void;

    public function getSurveys(): Collection;

    /**
     * Returns first Survey in the list.
     *
     * @param string $surveyId
     *
     * @return SurveyInterface
     */
    public function getSurvey($surveyId): ?SurveyInterface;

    public function addSurvey(SurveyInterface $survey): void;

    public function getFirstSurvey(): ?SurveyInterface;

    public function getProcedureBehaviorDefinition(): ?ProcedureBehaviorDefinitionInterface;

    public function getProcedureUiDefinition(): ?ProcedureUiDefinitionInterface;

    public function getStatementFormDefinition(): ?StatementFormDefinitionInterface;

    public function getProcedureType(): ?ProcedureTypeInterface;

    public function setProcedureType(ProcedureTypeInterface $procedureType): void;

    public function setProcedureBehaviorDefinition(ProcedureBehaviorDefinitionInterface $procedureBehaviorDefinition): void;

    public function setProcedureUiDefinition(ProcedureUiDefinitionInterface $procedureUiDefinition): void;

    public function setStatementFormDefinition(StatementFormDefinitionInterface $statementFormDefinition): void;

    public function getDefaultExportFieldsConfiguration(): ExportFieldsConfigurationInterface;

    /**
     * @return Collection<int, ExportFieldsConfigurationInterface>
     */
    public function getExportFieldsConfigurations(): Collection;

    public function clearExportFieldsConfiguration(): void;
    public function addExportFieldsConfiguration(ExportFieldsConfigurationInterface $exportFieldsConfiguration): self;

    public function isInPublicParticipationPhase(): bool;

    public function addTagTopic(TagTopicInterface $tagTopic): void;

    /**
     * @return Collection<int, FileInterface>
     */
    public function getFiles();

    public function setFiles(?ArrayCollection $files): void;

    public function getXtaPlanId(): string;

    public function setXtaPlanId(string $xtaPlanId): self;

    /**
     * @return Collection<int, PlaceInterface>
     */
    public function getSegmentPlaces(): Collection;

    public function addSegmentPlace(PlaceInterface $place): void;


}
