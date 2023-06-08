<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;

interface OrgaTypeInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * AHB = Anhörungsbehörde = hearing authority.
     *
     * @const string Denotes a hearing authority agency
     */
    public const HEARING_AUTHORITY_AGENCY = 'OHAUTH';

    /**
     * @const string Denotes a public agency (Institution)
     */
    public const PUBLIC_AGENCY = 'OPSORG';

    /**
     * @const string Denotes a planning agency (Planungsbüro)
     */
    public const PLANNING_AGENCY = 'OPAUTH';

    /**
     * @const string Denotes a municipality (Fachplaner)
     */
    public const MUNICIPALITY = 'OLAUTH';

    /**
     * @const string Default orga type when no other fits
     */
    public const DEFAULT = 'OTDEFA';

    public const ORGATYPE_ROLE = [
        self::PUBLIC_AGENCY            => [
            RoleInterface::PUBLIC_AGENCY_COORDINATION,
            RoleInterface::PUBLIC_AGENCY_WORKER,
        ],
        self::MUNICIPALITY             => [
            RoleInterface::PLANNING_AGENCY_ADMIN,
            RoleInterface::PLANNING_AGENCY_WORKER,
        ],
        self::PLANNING_AGENCY          => [
            RoleInterface::PRIVATE_PLANNING_AGENCY,
        ],
        self::HEARING_AUTHORITY_AGENCY => [
            RoleInterface::HEARING_AUTHORITY_ADMIN,
            RoleInterface::HEARING_AUTHORITY_WORKER,
        ],
    ];

    /**
     * Set otName.
     *
     * @param string $name
     */
    public function setName($name);

    public function getName(): string;

    /**
     * Set otLabel.
     *
     * @param string $label
     */
    public function setLabel($label);

    public function getLabel(): string;

    /**
     * @return Collection<int, OrgaStatusInCustomerInterface>
     */
    public function getOrgaStatusInCustomers();

    /**
     * @param Collection<int, OrgaStatusInCustomerInterface> $orgaStatusInCustomers
     */
    public function setOrgaStatusInCustomers(Collection $orgaStatusInCustomers);
}
