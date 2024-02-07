<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface RoleInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const HEARING_AUTHORITY_ROLES = [RoleInterface::HEARING_AUTHORITY_ADMIN, RoleInterface::HEARING_AUTHORITY_WORKER];
    public const PLANNING_AGENCY_ROLES = [RoleInterface::PLANNING_AGENCY_ADMIN, RoleInterface::PLANNING_AGENCY_WORKER];
    public const PUBLIC_AGENCY_ROLES = [RoleInterface::PUBLIC_AGENCY_COORDINATION, RoleInterface::PUBLIC_AGENCY_WORKER];

    /**
     * Fachplaner-Masteruser GLAUTH Kommune.
     *
     * @const string
     */
    public const ORGANISATION_ADMINISTRATION = 'RMOPSM';

    /**
     * Fachplaner-Admin GLAUTH Kommune.
     *
     * @const string
     */
    public const PLANNING_AGENCY_ADMIN = 'RMOPSA';

    /**
     * Fachplaner-Planungsbüro GLAUTH Kommune.
     *
     * @const string
     */
    public const PRIVATE_PLANNING_AGENCY = 'RMOPPO';

    /**
     * Fachplaner-Fachbehörde GLAUTH Kommune.
     *
     * @const string
     */
    public const PLANNING_SUPPORTING_DEPARTMENT = 'RMOPFB';

    /**
     * Fachplaner-Sachbearbeiter GLAUTH Kommune.
     *
     * @const string
     */
    public const PLANNING_AGENCY_WORKER = 'RMOPSD';

    /**
     * Institutions-Koordination GPSORG.
     *
     * @const string
     */
    public const PUBLIC_AGENCY_COORDINATION = 'RPSOCO';

    /**
     * Institutions-Sachbearbeitung GPSORG.
     *
     * @const string
     */
    public const PUBLIC_AGENCY_WORKER = 'RPSODE';

    /**
     * Institutions-Verwaltung.
     *
     * @const string
     */
    public const PUBLIC_AGENCY_SUPPORT = 'RPSUPP';

    /**
     * Gast GGUEST Gast.
     *
     * @const string
     */
    public const GUEST = 'RGUEST';

    /**
     * Interessent GINTPA Interessent.
     *
     * @const string
     */
    public const PROSPECT = 'RINTPA';

    /**
     * Verfahrenssupport GTSUPP Verfahrenssupport.
     *
     * Can add new users and assign roles.
     *
     * @const string
     */
    public const PLATFORM_SUPPORT = 'RTSUPP';

    /**
     * MasterUser eines Mandanten.
     * Mandanten-Administration.
     *
     * Can manage customer affairs.
     *
     * @const string
     */
    public const CUSTOMER_MASTER_USER = 'RCOMAU';

    /**
     * Redakteur Global News.
     *
     * @const string
     */
    public const CONTENT_EDITOR = 'RTEDIT';

    /**
     * Bürger.
     *
     * @const string
     */
    public const CITIZEN = 'RCITIZ';

    /**
     * Moderator.
     *
     * @const string
     */
    public const BOARD_MODERATOR = 'RMODER';

    /**
     * Fachliche Leitstelle.
     *
     * @const string
     */
    public const PROCEDURE_CONTROL_UNIT = 'RFALST';

    /**
     * Datenerfassung.
     *
     * @const string
     */
    public const PROCEDURE_DATA_INPUT = 'RDATA';

    /**
     * Role for AiApiUser.
     *
     * @const string
     */
    public const API_AI_COMMUNICATOR = 'RAICOM';

    // @improve T14690 move this to a better place. these are group codes, not role codes

    /**
     * Institution.
     *
     * @const string
     */
    public const GPSORG = 'GPSORG';

    /**
     * Gast/Bürger (unangemeldet).
     *
     * @const string
     */
    public const GGUEST = 'GGUEST';

    /**
     * Fachplaner.
     *
     * @const string
     */
    public const GLAUTH = 'GLAUTH';

    /**
     * Verfahrenssupport.
     *
     * @const string
     */
    public const GTSUPP = 'GTSUPP';

    /**
     * Moderatorengruppe.
     *
     * @const string
     */
    public const GMODER = 'GMODER';

    /**
     * Bürgergruppe (angemeldet).
     *
     * @const string
     */
    public const GCITIZ = 'GCITIZ';

    /**
     * Interessentengruppe.
     *
     * @const string
     */
    public const GINTPA = 'GINTPA';

    /**
     * Redakteurgruppe.
     *
     * @const string
     */
    public const GTEDIT = 'GTEDIT';

    /**
     * Fachliche Leitstelle Gruppe.
     *
     * @const string
     */
    public const GFALST = 'GFALST';

    /**
     * Datenerfassungsgruppe.
     *
     * @const string
     */
    public const GDATA = 'GDATA';

    /**
     * Institutions-Verwaltung Gruppe.
     *
     * @const string
     */
    public const GPSUPP = 'GPSUPP';

    /**
     * MasterUser Gruppe eines Mandanten.
     *
     * @const string
     */
    public const CUSTOMERMASTERUSERGROUP = 'GCOMAU';

    /**
     * Super fancy group name for Ai Communcation user.
     *
     * @const string
     */
    public const GAICOM = 'GAICOM';

    /**
     * AHB-Admin = Anhörungsbehörde-Admin = hearing authority admin.
     * Administrator within an hearing authority (german: "Anhörungsbehörde").
     *
     * @const string
     */
    public const HEARING_AUTHORITY_ADMIN = 'RMOPHA';

    /**
     * AHB-SB = Anhörungsbehörde-Sachbearbeiter = hearing authority wroker.
     *
     * @const string
     */
    public const HEARING_AUTHORITY_WORKER = 'RMOHAW';

    /**
     * Group of hearing authority.
     *
     * @const string
     */
    public const GHEAUT = 'GHEAUT';

    /**
     * Mapping of the role codes to translation keys.
     * This allows us to make them translatable.
     *
     * @const array<string, string>
     */
    public const ROLE_CODE_NAME_MAP =
        [
            self::ORGANISATION_ADMINISTRATION     => 'role.fpmu',
            self::PRIVATE_PLANNING_AGENCY         => 'role.fppb',
            self::PLANNING_AGENCY_ADMIN           => 'role.fpa',
            self::PLANNING_SUPPORTING_DEPARTMENT  => 'role.fpfb',
            self::PLANNING_AGENCY_WORKER          => 'role.fpsb',
            self::PUBLIC_AGENCY_COORDINATION      => 'role.tbko',
            self::PUBLIC_AGENCY_WORKER            => 'role.tbsb',
            self::PUBLIC_AGENCY_SUPPORT           => 'role.tbmaster',
            self::GUEST                           => 'role.guest',
            self::PROSPECT                        => 'role.prospect',
            self::PLATFORM_SUPPORT                => 'role.supp',
            self::CUSTOMER_MASTER_USER            => 'role.cmu',
            self::CONTENT_EDITOR                  => 'role.editor',
            self::CITIZEN                         => 'role.citizen',
            self::BOARD_MODERATOR                 => 'role.moder',
            self::PROCEDURE_CONTROL_UNIT          => 'role.falst',
            self::PROCEDURE_DATA_INPUT            => 'role.data',
            self::API_AI_COMMUNICATOR             => 'role.aiapi',
            self::HEARING_AUTHORITY_ADMIN         => 'role.haa',
            self::HEARING_AUTHORITY_WORKER        => 'role.haw',
        ];

    /**
     * Set code.
     *
     * @param string $code
     *
     * @return RoleInterface
     */
    public function setCode($code);

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Set Name.
     *
     * @param string $name
     *
     * @return RoleInterface
     */
    public function setName($name);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set GroupCode.
     *
     * @param string $groupCode
     *
     * @return RoleInterface
     */
    public function setGroupCode($groupCode);

    /**
     * Get GroupCode.
     *
     * @return string
     */
    public function getGroupCode();

    /**
     * Set GroupName.
     *
     * @param string $groupName
     *
     * @return RoleInterface
     */
    public function setGroupName($groupName);

    /**
     * Get groupName.
     *
     * @return string
     */
    public function getGroupName();
}
