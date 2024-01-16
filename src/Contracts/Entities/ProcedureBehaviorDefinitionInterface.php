<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ProcedureBehaviorDefinitionInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function getProcedure(): ?ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure): void;

    public function getProcedureType(): ?ProcedureTypeInterface;

    public function setProcedureType(ProcedureTypeInterface $procedureType): void;

    public function isAllowedToEnableMap(): bool;

    public function setAllowedToEnableMap(bool $allowedToEnableMap): void;

    public function hasPriorityArea(): bool;

    public function setHasPriorityArea(bool $hasPriorityArea): void;

    public function isParticipationGuestOnly(): bool;

    public function setParticipationGuestOnly(bool $participationGuestOnly): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;
}
