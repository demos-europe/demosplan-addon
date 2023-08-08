<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Tightenco\Collect\Support\Collection;

interface DepartmentInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * For technical reasons, a department is always required, even if none is given.
     * This is the default name.
     */
    public const DEFAULT_DEPARTMENT_NAME = 'Keine Abteilung';

    public function setId(string $id): void;

    /**
     * @return DepartmentInterface
     */
    public function setName(string $name);

    public function getName(): string;

    /**
     * @param string $code
     *
     * @return DepartmentInterface
     */
    public function setCode($code);

    /**
     * @return string
     */
    public function getCode();

    /**
     * @param DateTime $createdDate
     *
     * @return DepartmentInterface
     */
    public function setCreatedDate(DateTimeInterface $createdDate);

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @param DateTime $modifiedDate
     *
     * @return DepartmentInterface
     */
    public function setModifiedDate(DateTimeInterface $modifiedDate);

    /**
     * @return DateTime
     */
    public function getModifiedDate();

    /**
     * @param bool $deleted
     *
     * @return DepartmentInterface
     */
    public function setDeleted($deleted);

    /**
     * @return bool
     */
    public function getDeleted();

    /**
     * @return bool
     */
    public function isDeleted();

    /**
     * @param string|null $gwId
     *
     * @return DepartmentInterface
     */
    public function setGwId($gwId);

    /**
     * @return string|null
     */
    public function getGwId();

    /**
     * Organisation des Departments.
     *
     * @return OrgaInterface|null
     */
    public function getOrga();

    /**
     * Will return an empty string, if no Orga is set.
     *
     * @return string
     */
    public function getOrgaName();

    /**
     * Add Orga to this Department.
     */
    public function addOrga(OrgaInterface $orga);

    /**
     * @return AddressInterface
     */
    public function getAddress();

    /**
     * @return ArrayCollection<int,AddressInterface>
     */
    public function getAddresses();

    /**
     * Add Address to Orga.
     *
     * @param AddressInterface $address
     */
    public function addAddress($address);

    /**
     * @return ArrayCollection
     */
    public function getAllUsers();

    /**
     * Returns all users of this department, which are not deleted === true.
     *
     * @return Collection<int,UserInterface>
     */
    public function getUsers();

    /**
     * @param array<int,UserInterface> $users
     */
    public function setUsers($users): self;

    /**
     * Add user to this Department, if not already exists in the collection.
     */
    public function addUser(UserInterface $user);

    /**
     * Remove user from Department.
     */
    public function removeUser(UserInterface $user);
}
