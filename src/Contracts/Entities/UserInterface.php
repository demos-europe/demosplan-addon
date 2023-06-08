<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use DateTimeInterface;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Hslavich\OneloginSamlBundle\Security\User\SamlUserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

interface UserInterface extends SecurityUserInterface, UuidEntityInterface, SamlUserInterface
{
    /**
     * Set hard coded anonymous user Values until refactored.
     */
    public const ANONYMOUS_USER_DEPARTMENT_ID = '3c77f7b4-3f07-11e4-a6a8-005056ae0004';
    public const ANONYMOUS_USER_DEPARTMENT_NAME = 'anonym';
    public const ANONYMOUS_USER_ID = '73830656-3e48-11e4-a6a8-005056ae0004';
    public const ANONYMOUS_USER_LOGIN = 'anonym@bobsh.de';
    public const ANONYMOUS_USER_NAME = 'Privatperson';
    public const ANONYMOUS_USER_ORGA_ID = 'cdec5e4b-3f06-11e4-a6a8-005056ae0004';
    public const ANONYMOUS_USER_ORGA_NAME = 'Privatperson';
    public const FHHNET_PREFIX = 'FHHNET\\';
    public const DEFAULT_ORGA_USER_NAME = 'Institution';

    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getDmId();

    /**
     * @param int $dmId
     */
    public function setDmId($dmId);

    /**
     * @return string
     */
    public function getGender();

    /**
     * @param string $gender
     */
    public function setGender($gender);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @return string
     */
    public function getFullname();

    /**
     * @return string
     */
    public function getName();

    public function getIdent(): ?string;

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname);

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @param string $lastname
     */
    public function setLastname($lastname);

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email);

    public function getLogin(): ?string;

    public function setLogin(?string $login): void;

    /**
     * Symfony > 6 needs getUserIdentifier() for auth system.
     */
    public function getUserIdentifier(): ?string;

    public function setPassword(?string $password): void;

    /**
     * @deprecated $this->password should be safe now
     *
     * @return string|null
     */
    public function getAlternativeLoginPassword();

    public function setAlternativeLoginPassword(?string $alternativeLoginPassword);

    public function setSalt(?string $salt): SecurityUserInterface;

    /**
     * @return string
     */
    public function getLanguage();

    /**
     * @param string $language
     */
    public function setLanguage($language);

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @param DateTime $createdDate
     */
    public function setCreatedDate(DateTime $createdDate);

    /**
     * @return DateTime
     */
    public function getModifiedDate();

    /**
     * @param DateTime $modifiedDate
     */
    public function setModifiedDate(DateTimeInterface $modifiedDate);

    /**
     * @param DateTime|DateTimeImmutable $lastLogin
     */
    public function setLastLogin(DateTimeInterface $lastLogin): void;

    /**
     * @return DateTime|DateTimeImmutable|null
     */
    public function getLastLogin(): ?DateTimeInterface;

    /**
     * @return bool
     */
    public function isDeleted();

    /**
     * @param bool $deleted
     */
    public function setDeleted($deleted);

    /**
     * @return string
     */
    public function getGwId();

    /**
     * @param string $gwId
     */
    public function setGwId($gwId);

    /**
     * Ist das Passwort noch als md5 gespeichert?
     */
    public function isLegacy(): bool;

    /**
     * @return array
     */
    public function getFlags();

    /**
     * Do not use Matomo. Should be $useMatomo.
     */
    public function getNoPiwik(): bool;

    /**
     * @param bool $noPiwik
     */
    public function setNoPiwik($noPiwik);

    public function getAssignedTaskNotification(): bool;

    public function setAssignedTaskNotification(bool $assignedTaskNotification);

    public function getNewsletter(): bool;

    /**
     * @param bool $newsletter
     */
    public function setNewsletter($newsletter);

    public function isNewUser(): bool;

    /**
     * @param bool $newUser
     */
    public function setNewUser($newUser);

    public function isIntranet(): bool;

    /**
     * @param bool $intranet
     */
    public function setIntranet($intranet);

    public function isProfileCompleted(): bool;

    /**
     * @param bool $profileCompleted
     */
    public function setProfileCompleted($profileCompleted);

    /**
     * Is the user Guest or Citizen?
     */
    public function isPublicUser(): bool;

    /**
     * Is the user Guest only?
     */
    public function isGuestOnly(): bool;

    public function isPlanner(): bool;

    public function isHearingAuthority(): bool;

    /**
     * Role::ORGANISATION_ADMINISTRATION is not included.
     */
    public function isProcedureAdmin(): bool;

    public function isPlanningAgency(): bool;

    public function isPublicAgency(): bool;

    /**
     * Is the user Citizen?
     */
    public function isCitizen(): bool;

    public function getForumNotification(): bool;

    /**
     * @param bool $forumNotification
     */
    public function setForumNotification($forumNotification);

    public function isAccessConfirmed(): bool;

    /**
     * @param bool $accessConfirmed
     */
    public function setAccessConfirmed($accessConfirmed);

    public function isInvited(): bool;

    /**
     * @param bool $invited
     */
    public function setInvited($invited);

    /**
     * Add arbitrary UserFlag.
     *
     * @param string $key
     * @param bool   $value
     */
    public function addFlag($key, $value);

    /**
     * Return arbitrary UserFlag.
     *
     * @param string $key
     */
    public function getFlag($key): bool;

    public function addAuthorizedProcedure(ProcedureInterface $procedure): bool;

    /**
     * @return Collection<int, ProcedureInterface>
     */
    public function getAuthorizedProcedures(): Collection;

    /**
     * Organisation des Users.
     */
    public function getOrga(): ?OrgaInterface;

    /**
     * Returns the Id of the organisation where this user belongs to, if exists, otherwise null.
     *
     * @return string|null
     */
    public function getOrganisationId();

    /**
     * Returns the name of the organisation where this user belongs to, if exists, otherwise null.
     *
     * @return string|null
     */
    public function getOrgaName();

    /**
     * Legacyfunction to provide OrgaName to be safer on refactoring.
     */
    public function getOrganisationNameLegal(): ?string;

    /**
     * Organisation des Users hinzufügen.
     */
    public function setOrga(OrgaInterface $orga);

    /**
     * Organisation des Users entfernen.
     */
    public function unsetOrgas();

    /**
     * Department des Users.
     *
     * @return DepartmentInterface|null
     */
    public function getDepartment();

    public function getDepartmentId(): string;

    /**
     * Legacyfunction to provide DepartmentName to be safer on refactoring.
     *
     * @return string
     */
    public function getDepartmentNameLegal();

    public function getDepartmentName(): string;

    /**
     * Department des Users.
     *
     * @return Collection<int, DepartmentInterface>
     */
    public function getDepartments();

    /**
     * Add Department to User.
     */
    public function addDepartment(DepartmentInterface $department);

    /**
     * Replace a Department of User.
     */
    public function setDepartment(DepartmentInterface $department);

    /**
     * Remove Department from User.
     */
    public function removeDepartment(DepartmentInterface $department);

    /**
     * Unset Department.
     */
    public function unsetDepartment();

    public function getAddress(): ?AddressInterface;

    /**
     * @return Collection<int, AddressInterface>
     */
    public function getAddresses();

    /**
     * @param array $addresses
     *
     * @return $this
     */
    public function setAddresses($addresses);

    /**
     * Add Address to User.
     *
     * @param AddressInterface $address
     */
    public function addAddress($address);

    /**
     * Get Postalcode from associated (first) {@link AddressInterface}.
     */
    public function getPostalcode(): string;

    /**
     * @param string $postalcode
     *
     * @return $this
     */
    public function setPostalcode($postalcode);

    /**
     * Get City from associated (first) {@link AddressInterface}.
     */
    public function getCity(): string;

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city);

    /**
     * Get Street from associated (first) {@link AddressInterface}.
     */
    public function getStreet(): string;

    /**
     * Get Housenumber from associated (first) {@link AddressInterface}.
     */
    public function getHouseNumber(): string;

    /**
     * @return $this
     */
    public function setHouseNumber(string $houseNumber);

    /**
     * @param string $street
     *
     * @return $this
     */
    public function setStreet($street);

    /**
     * Get State from associated (first) {@link AddressInterface}.
     */
    public function getState(): ?string;

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState($state);

    /**
     * Save single Value in associated Address.
     *
     * @param string $key
     * @param string $value
     */
    public function setAddressValue($key, $value);

    /**
     * @param array<int, string> $roles
     */
    public function setRolesAllowed($roles): void;

    public function getTwinUser(): ?SecurityUserInterface;

    public function hasTwinUser(): bool;

    public function setTwinUser(?UserInterface $twinUser): SecurityUserInterface;

    /**
     * Returns collection of roles the user has with a specified customer (current is default).
     *
     * @return Collection<int, RoleInterface>
     */
    public function getDplanroles(CustomerInterface $customer = null): Collection;

    /**
     * Returns an array of the code of roles the user has with a specified customer (current is default).
     *
     * @return string[]
     */
    public function getDplanRolesArray(CustomerInterface $customer = null): array;

    /**
     * This function is needed to clear the roles cache to prevent roles being still present
     * after they have been actually removed.
     */
    public function clearRolesCache(): void;

    /**
     * @return string[]
     */
    public function getDplanRoleGroupsArray();

    /**
     * Alias for getDplanRoleGroupsArray, used e.g. in twig.
     *
     * @return string[]
     */
    public function getRoleGroups();

    /**
     * @return string|null
     */
    public function getDplanRolesString();

    /**
     * @return string|null
     */
    public function getDplanRolesGroupString();

    /**
     * Sets Roles. Note that, in order to do this, {@link UserRoleInCustomerInterface} objects are created which have a role and
     * the current customer.
     *
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/permissions/ Wiki: Permissions, Roles, etc.
     *
     * @param RoleInterface[]        $roles
     * @param CustomerInterface|null $customer
     */
    public function setDplanroles(array $roles, $customer = null): void;

    /**
     * @param Collection<int,UserRoleInCustomerInterface> $roleInCustomers
     */
    public function setRoleInCustomers(Collection $roleInCustomers): void;

    /**
     * @param CustomerInterface|null $customer
     */
    public function addDplanrole(RoleInterface $role, $customer = null);

    /**
     * Check whether user has role (code) with a specified customer (current is default).
     *
     * @param string $role
     */
    public function hasRole($role, CustomerInterface $customer = null): bool;

    public function hasAnyOfRoles(array $roles): bool;

    /**
     * Alias for getDplanRolesString.
     *
     * @return string
     */
    public function getRole();

    /**
     * Setzen des loggedIn Status auf true.
     */
    public function isLoggedIn(): bool;

    public function getEntityContentChangeIdentifier(): string;

    public function getDraftStatementSubmissionReminderEnabled(): bool;

    public function setDraftStatementSubmissionReminderEnabled(bool $draftStatementSubmissionReminderEnabled);

    /**
     * Retrieve all customers that the user is associated with in any way.
     *
     * @return array<int, CustomerInterface>
     */
    public function getCustomers(): array;

    /**
     * Retrieve all customers that the user is associated with directly. This is only the case for customer users.
     *
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/permissions/ wiki: customer role user orga logic
     */
    public function getCustomersForCustomerUsers(): array;

    /**
     * Retrieve all customers that the user is associated with through an orga.
     *
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/permissions/ wiki: customer role user orga logic
     *
     * @param array $orgaType Per default, all are returned. Array of orgaType constants.
     */
    public function getCustomersForUsersOfOrganisationsOfType(array $orgaType = [OrgaTypeInterface::MUNICIPALITY, OrgaTypeInterface::PLANNING_AGENCY, OrgaTypeInterface::PUBLIC_AGENCY]): array;

    /**
     * The user has an organization that, in its role as "Kommmune", can only have one customer. Get that customer.
     *
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/permissions/ wiki: customer role user orga logic
     *
     * @return CustomerInterface|null
     */
    public function getCustomersForUsersOfOrganisationsOfTypeKommune();

    /**
     * Returns an array of Customer ids.
     */
    public function getCustomersIds(): array;

    /**
     * @return Collection<int,UserRoleInCustomerInterface>
     */
    public function getRoleInCustomers(): Collection;

    /**
     * May be null e.g. during user add.
     */
    public function getCurrentCustomer(): ?CustomerInterface;

    public function setCurrentCustomer(CustomerInterface $currentCustomer): void;

    /**
     * Given a subdomain returns the role that current user plays there.
     * If user doesn't belong to subdomain, then empty string is returned.
     *
     * @return string
     */
    public function getRoleBySubdomain(string $subdomain);

    /**
     * @return Collection<int, SurveyVoteInterface>
     */
    public function getSurveyVotes(): Collection;

    /**
     * Returns SurveyVote with the given id or null if none exists.
     *
     * @param string $surveyVoteId
     */
    public function getSurveyVote($surveyVoteId): ?SurveyVoteInterface;

    public function addSurveyVote(SurveyVoteInterface $surveyVote): void;

    /**
     * Should be indexed in Elasticsearch.
     */
    public function shouldBeIndexed(): bool;

    public function isDefaultGuestUser(): bool;

    public function isProvidedByIdentityProvider(): bool;

    public function setProvidedByIdentityProvider(bool $providedByIdentityProvider): void;

}
