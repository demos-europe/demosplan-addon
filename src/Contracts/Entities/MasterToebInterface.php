<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use DateTimeInterface;

interface MasterToebInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @return mixed
     */
    public function getGatewayGroup();

    /**
     * @param mixed $gatewayGroup
     *
     * @return MasterToebInterface
     */
    public function setGatewayGroup($gatewayGroup);

    /**
     * @return mixed
     */
    public function getOrgaName();

    /**
     * @param mixed $orgaName
     *
     * @return MasterToebInterface
     */
    public function setOrgaName($orgaName);

    /**
     * @return OrgaInterface
     */
    public function getOrga();

    /**
     * alias for @link MasterToebInterface::getOrga()
     * @return OrgaInterface
     */
    public function getOrganisation();

    /**
     * @param mixed $orga
     *
     * @return MasterToebInterface
     */
    public function setOrga($orga);

    /**
     * alias for @link MasterToebInterface::setOrga()
     * @param mixed $orga
     *
     * @return MasterToebInterface
     */
    public function setOrganisation($orga);

    /**
     * gets the Organisation id
     * @return string|null
     */
    public function getOId();

    /**
     * @return mixed
     */
    public function getDepartment();

    /**
     * @param mixed $department
     *
     * @return MasterToebInterface
     */
    public function setDepartment($department);

    /**
     * gets the Department id
     * @return string|null
     */
    public function getDId();

    /**
     * @return mixed
     */
    public function getDepartmentName();

    /**
     * @param mixed $departmentName
     *
     * @return MasterToebInterface
     */
    public function setDepartmentName($departmentName);

    /**
     * @return mixed
     */
    public function getSign();

    /**
     * @param mixed $sign
     *
     * @return MasterToebInterface
     */
    public function setSign($sign);

    /**
     * @return mixed *
     */
    public function getEmail();

    /**
     * @param mixed $email
     *
     * @return MasterToebInterface
     */
    public function setEmail($email);

    /**
     * @return mixed
     */
    public function getCcEmail();

    /**
     * @param mixed $ccEmail
     *
     * @return MasterToebInterface
     */
    public function setCcEmail($ccEmail);

    /**
     * @return mixed
     */
    public function getContactPerson();

    /**
     * @param string $contactPerson
     *
     * @return MasterToebInterface
     */
    public function setContactPerson($contactPerson);

    /**
     * @return mixed
     */
    public function getMemo();

    /**
     * @param mixed $memo
     *
     * @return MasterToebInterface
     */
    public function setMemo($memo);

    /**
     * @return int
     */
    public function getDistrictHHMitte();

    /**
     * @param int $districtHHMitte
     *
     * @return MasterToebInterface
     */
    public function setDistrictHHMitte($districtHHMitte);

    /**
     * @return mixed
     */
    public function getDistrictEimsbuettel();

    /**
     * @param int $districtEimsbuettel
     *
     * @return MasterToebInterface
     */
    public function setDistrictEimsbuettel($districtEimsbuettel);

    /**
     * @return int
     */
    public function getDistrictAltona();

    /**
     * @param int $districtAltona
     *
     * @return MasterToebInterface
     */
    public function setDistrictAltona($districtAltona);

    /**
     * @return int
     */
    public function getDistrictHHNord();

    /**
     * @param int $districtHHNord
     *
     * @return MasterToebInterface
     */
    public function setDistrictHHNord($districtHHNord);

    /**
     * @return int
     */
    public function getDistrictWandsbek();

    /**
     * @param int $districtWandsbek
     *
     * @return MasterToebInterface
     */
    public function setDistrictWandsbek($districtWandsbek);

    /**
     * @return int
     */
    public function getDistrictBergedorf();

    /**
     * @param int $districtBergedorf
     *
     * @return MasterToebInterface
     */
    public function setDistrictBergedorf($districtBergedorf);

    /**
     * @return int
     */
    public function getDistrictHarburg();

    /**
     * @param int $districtHarburg
     *
     * @return MasterToebInterface
     */
    public function setDistrictHarburg($districtHarburg);

    /**
     * @return int
     */
    public function getDistrictBsu();

    /**
     * @param int $districtBsu
     *
     * @return MasterToebInterface
     */
    public function setDistrictBsu($districtBsu);

    /**
     * @return bool
     */
    public function getDocumentRoughAgreement();

    /**
     * @param bool $documentRoughAgreement
     *
     * @return MasterToebInterface
     */
    public function setDocumentRoughAgreement($documentRoughAgreement);

    /**
     * @return bool
     */
    public function getDocumentAgreement();

    /**
     * @param bool $documentAgreement
     *
     * @return MasterToebInterface
     */
    public function setDocumentAgreement($documentAgreement);

    /**
     * @return bool
     */
    public function getDocumentNotice();

    /**
     * @param bool $documentNotice
     *
     * @return MasterToebInterface
     */
    public function setDocumentNotice($documentNotice);

    /**
     * @return bool
     */
    public function getDocumentAssessment();

    /**
     * @param bool $documentAssessment
     *
     * @return MasterToebInterface
     */
    public function setDocumentAssessment($documentAssessment);

    /**
     * @return bool
     */
    public function getRegistered();

    /**
     * @param int $registered
     *
     * @return MasterToebInterface
     */
    public function setRegistered($registered);

    /**
     * @return string
     */
    public function getComment();

    /**
     * @param string $comment
     *
     * @return MasterToebInterface
     */
    public function setComment($comment);

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @param DateTime $createdDate
     *
     * @return MasterToebInterface
     */
    public function setCreatedDate(DateTimeInterface $createdDate);

    /**
     * @return DateTime
     */
    public function getModifiedDate();

    /**
     * @param DateTime $modifiedDate
     *
     * @return MasterToebInterface
     */
    public function setModifiedDate(DateTimeInterface $modifiedDate);
}
