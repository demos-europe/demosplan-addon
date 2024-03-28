<?php declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use demosplan\DemosPlanCoreBundle\Entity\Procedure\Procedure;

interface ProcedurePhaseInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getKey(): string;

    public function setKey(string $key): void;

    public function getPermissionSet(): string;

    public function setPermissionSet(string $permissionSet): void;

    public function getStartDate(): DateTime;

    public function setStartDate(DateTime $startDate): void;

    public function getEndDate(): DateTime;

    public function setEndDate(DateTime $endDate): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;

    public function getDesignatedPhase(): ?string;

    public function setDesignatedPhase(?string $designatedPhase): void;

    public function getDesignatedSwitchDate(): ?DateTime;

    public function setDesignatedSwitchDate(?DateTime $designatedSwitchDate): void;

    public function getDesignatedPhaseChangeUser(): ?UserInterface;

    public function setDesignatedPhaseChangeUser(?UserInterface $designatedPhaseChangeUser): void;

    public function getDesignatedEndDate(): ?DateTime;

    public function setDesignatedEndDate(?DateTime $designatedEndDate): void;

    public function getStep(): string;

    public function setStep(string $step): void;

    public function copyValuesFromPhase(ProcedurePhaseInterface $sourcePhase): void;
}
