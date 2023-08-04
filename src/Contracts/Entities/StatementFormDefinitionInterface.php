<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use DateTime;

interface StatementFormDefinitionInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const MAP_AND_COUNTY_REFERENCE = 'mapAndCountyReference';
    public const COUNTY_REFERENCE = 'countyReference';
    public const NAME = 'name';
    public const POSTAL_AND_CITY = 'postalAndCity';
    public const GET_EVALUATION_MAIL_VIA_EMAIL = 'getEvaluationMailViaEmail';
    public const GET_EVALUATION_MAIL_VIA_SNAIL_MAIL_OR_EMAIL = 'getEvaluationMailViaSnailMailOrEmail';

    public const CITIZEN_XOR_ORGA_AND_ORGA_NAME = 'citizenXorOrgaAndOrgaName';
    public const STREET = 'street';
    public const STREET_AND_HOUSE_NUMBER = 'streetAndHouseNumber';
    public const PHONE = 'phoneNumber';
    public const EMAIL = 'emailAddress';
    public const PHONE_OR_EMAIL = 'phoneOrEmail';
    public const STATE_AND_GROUP_AND_ORGA_NAME_AND_POSITION = 'stateAndGroupAndOrgaNameAndPosition';

    public function getFieldDefinitions(): Collection;

    /**
     * @return Collection<int, StatementFieldDefinitionInterface>
     */
    public function getEnabledFieldDefinitions(): Collection;

    public function getFieldDefinitionByName(string $name): ?StatementFieldDefinitionInterface;

    public function isFieldDefinitionEnabled(string $name);
    public function getProcedure(): ?ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure): void;

    public function getProcedureType(): ?ProcedureTypeInterface;

    public function setProcedureType(ProcedureTypeInterface $procedureType): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;
}