<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Tightenco\Collect\Support\Collection as TightencoCollection;

/**
 * additional methods inherited from SluggedEntity are not part of this interface
 */
interface OrgaInterface extends UuidEntityInterface, CoreEntityInterface, SluggedEntityInterface
{
    /**
     * Key for default statement submission type with coordinator.
     */
    public const STATEMENT_SUBMISSION_TYPE_DEFAULT = 'standard';

    /**
     * Key for short statement submission type without coordinator.
     */
    public const STATEMENT_SUBMISSION_TYPE_SHORT = 'short';

    public function setId(string $id): self;

    public function setName(?string $name): self;

    public function getName(): ?string;

    /**
     * Alias for getName().
     */
    public function getNameLegal(): ?string;

    public function getGatewayName(): ?string;

    public function setGatewayName(?string $gatewayName): self;

    public function setCode(?string $code): self;

    public function getCode(): ?string;

    /**
     * @param DateTime|DateTimeImmutable $createdDate
     */
    public function setCreatedDate(DateTimeInterface $createdDate): self;

    /**
     * @return DateTime|DateTimeImmutable
     */
    public function getCreatedDate(): DateTimeInterface;

    /**
     * @param DateTime|DateTimeImmutable $modifiedDate
     */
    public function setModifiedDate(DateTimeInterface $modifiedDate): self;

    /**
     * @return DateTime|DateTimeImmutable
     */
    public function getModifiedDate(): DateTimeInterface;

    public function getCcEmail2(): ?string;

    public function setCcEmail2(?string $ccEmail2): self;

    public function getEmailReviewerAdmin(): ?string;

    public function setEmailReviewerAdmin(?string $emailReviewerAdmin): self;

    public function setDeleted(bool $deleted): self;

    public function getDeleted(): bool;

    public function isDeleted(): bool;

    public function setShowname(bool $showname): self;

    public function getShowname(): bool;

    public function isShowname(): bool;

    public function setShowlist(bool $showlist): self;

    public function getShowlist(): bool;

    public function isShowlist(): bool;

    public function setGwId(?string $gwId): self;

    public function getGwId(): ?string;

    public function setCompetence(?string $competence): self;

    public function getCompetence(): ?string;

    public function setEmail2(?string $email2): self;

    public function getEmail2(): ?string;

    public function getParticipationEmail(): ?string;

    public function setParticipationEmail(string $emailAddress): self;

    public function getContactPerson(): ?string;

    public function setContactPerson(?string $contactPerson): self;

    public function setPaperCopy(int $paperCopy): self;

    public function getPaperCopy(): ?int;

    public function setPaperCopySpec(?string $paperCopySpec): self;

    public function getPaperCopySpec(): ?string;

    /**
     * Get OrgaType.
     *
     * Needs to be callable without subdomain as getters are dynamically built
     * in convertToLegacy functions where no parameter is given
     *
     * @param string $subdomain
     *
     * @return OrgaTypeInterface[]
     */
    public function getOrgaTypes($subdomain, bool $acceptedOnly): array;

    /**
     * Shortcut get OrgaType name.
     * Needs to be callable without subdomain as getters are dynamically built
     * in convertToLegacy functions where no parameter is given.
     *
     * @param string $subdomain
     *
     * @return string[]
     */
    public function getTypes($subdomain, bool $acceptedOnly): array;

    /**
     * @return Collection<int,AddressInterface>
     */
    public function getAddresses(): Collection;

    /**
     * @param AddressInterface[] $addresses
     */
    public function setAddresses(array $addresses): self;

    /**
     * Returns the address of the orga. It should only be one.
     *
     * @return AddressInterface|false note that the return types of first() are the object or false
     */
    public function getAddress();

    public function addAddress(AddressInterface $address): self;

    /**
     * Get Street from associated (first) Address.
     *
     * @return string can be street (string) or empty string
     */
    public function getStreet(): string;

    public function setStreet($street): self;

    /**
     * Get Street from associated (first) Address.
     */
    public function getHouseNumber(): string;

    public function setHouseNumber($houseNumber): self;

    /**
     * Get State from associated (first) Address.
     */
    public function getState(): string;

    public function setState($state): self;

    /**
     * Get Fax from associated (first) Address.
     */
    public function getFax();

    /**
     * @param string $fax
     */
    public function setFax($fax): self;

    /**
     * Get Postalcode from associated (first) Address.
     */
    public function getPostalcode(): string;

    /**
     * @param string $postalcode
     */
    public function setPostalcode($postalcode): self;

    /**
     * Get City from associated (first) Address.
     */
    public function getCity();

    /**
     * @param string $city
     */
    public function setCity($city): self;

    /**
     * Get Phone from associated (first) Address.
     */
    public function getPhone(): string;

    /**
     * @param string $phone
     */
    public function setPhone($phone): self;

    public function getDataProtection(): string;

    public function setDataProtection(string $dataProtection): self;

    public function getImprint(): string;

    public function setImprint(string $imprint): self;

    public function addAdministratableProcedure(ProcedureInterface $procedure): bool;

    /**
     * @return Collection<int, ProcedureInterface>
     */
    public function getAdministratableProcedures(): Collection;

    /**
     * @return array
     */
    public function getNotifications();

    /**
     * @param array $notifications
     */
    public function setNotifications($notifications): self;

    public function addNotification($notification): self;

    /**
     * @return ArrayCollection|TightencoCollection
     */
    public function getAllUsers();

    /**
     * Returns all users of this organisation, which are not deleted === true.
     */
    public function getUsers(): TightencoCollection;

    /**
     * @param array<int,UserInterface> $users
     */
    public function setUsers($users): self;

    /**
     * Add user to this Organisation, if not already exists in the collection.
     */
    public function addUser(UserInterface $user): self;

    /**
     * Remove user from this Organisation.
     */
    public function removeUser(UserInterface $user): self;

    public function getDepartments(): TightencoCollection;

    /**
     * @param array<int,DepartmentInterface> $departments
     */
    public function setDepartments($departments): self;

    /**
     * Add department to this Organisation.
     */
    public function addDepartment(DepartmentInterface $department): self;

    /**
     * @return ArrayCollection|Collection
     */
    public function getProcedures();

    /**
     * @param ArrayCollection<int,ProcedureInterface>|Collection<int,ProcedureInterface> $procedures
     */
    public function setProcedures($procedures): self;

    public function getSubmissionType(): string;

    public function setSubmissionType(string $submissionType): self;

    /**
     * Returns all user (of all departments) of this organisation.
     *
     * @return TightencoCollection collection of {@link UserInterface} instances
     */
    public function getAllUsersOfDepartments();

    /**
     * @return Collection<int, AddressBookEntryInterface>
     */
    public function getAddressBookEntries();

    /**
     * @param AddressBookEntryInterface[] $addressBookEntries
     */
    public function setAddressBookEntries(array $addressBookEntries): self;

    /**
     * Add a single AddressBookEntry, if not already present in $this->addressBook.
     *
     * @return bool "true" if the given AddressBookEntry was successfully added to this organisation
     *              and this organisation was successfully added to the given AddressBookEntry, otherwise "false"
     */
    public function addAddressBookEntry(AddressBookEntryInterface $addressBookEntry): bool;

    /**
     * Removes a AddressBookEntry from this Organisation and also removes the other side of the relation.
     */
    public function removeAddressBookEntry(AddressBookEntryInterface $addressBookEntry): self;

    public function getLogo(): ?FileInterface;

    public function setLogo(?FileInterface $logo): self;

    /**
     * @return Collection<int, CustomerInterface>
     */
    public function getCustomers();

    /**
     * @param string $status for a list of Values check
     * @link OrgaStatusInCustomerInterface
     */
    public function addCustomerAndOrgaType(
        CustomerInterface $customer,
        OrgaTypeInterface $orgaType,
        string $status
    ): self;

    /**
     * @return Collection<int, OrgaStatusInCustomerInterface>
     */
    public function getStatusInCustomers(): Collection;

    /**
     * @param Collection<int, OrgaStatusInCustomerInterface> $statusInCustomers
     */
    public function setStatusInCustomers(Collection $statusInCustomers): self;

    public function addStatusInCustomer(OrgaStatusInCustomerInterface $orgaStatusInCustomer): self;

    public function addCustomer(CustomerInterface $customer): bool;

    /**
     * @param CustomerInterface[] $customers
     */
    public function addCustomers(array $customers): self;

    /**
     * Removes the customer from the list. If this is no Public Affairs Agency throws an InvalidArgumentException.
     * If it doesn't exists then does nothing.
     */
    public function removeCustomer(CustomerInterface $customer): self;

    public function __toString(): string;

    /**
     * Is current Orga registered in given customer/subdomain?
     */
    public function isRegisteredInSubdomain($subdomain): bool;

    /**
     * @return CustomerInterface|null
     */
    public function getMainCustomer();

    /**
     * Given an orga type name and a status ('pending', 'accepted', 'rejected') returns
     * the subdomains where the orga meets the two conditions.
     *
     * @see OrgaTypeInterface::PLANNING_AGENCY, OrgaTypeInterface::MUNICIPALITY, etc.
     *
     * @return CustomerInterface[]
     */
    public function getCustomersByActivationStatus(string $orgaTypeName, string $status): array;

    public function getMasterUser(string $subdomain): ?UserInterface;

    public function getMasterToeb(): ?MasterToebInterface;

    public function setMasterToeb(?MasterToebInterface $masterToeb): self;

    public function hasType(string $orgaType, string $currentSubdomain): bool;

    public function isDefaultCitizenOrganisation(): bool;

    public function getBranding(): ?BrandingInterface;

    public function setBranding(?BrandingInterface $branding): self;

    /**
     * @return Collection<int, InstitutionTagInterface>
     */
    public function getAssignedTags(): Collection;

    public function addAssignedTag(InstitutionTagInterface $tag): void;

    public function removeAssignedTag(InstitutionTagInterface $tag): void;

    public function addOwnInstitutionTag(InstitutionTagInterface $tag): void;

    /**
    * @return Collection<int, InstitutionTagInterface>
    */
    public function getOwnInstitutionTags(): Collection;

    public function removeOwnInstitutionTag(InstitutionTagInterface $tag): void;
}
