<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ProcedurePhaseDefinitionInterface extends UuidEntityInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getAudience(): string;

    /**
     * @param string $audience one of {@see StatementInterface::INTERNAL}, {@see StatementInterface::EXTERNAL}
     */
    public function setAudience(string $audience): void;

    public function getPermissionSet(): string;

    /**
     * @param string $permissionSet one of {
     *
     * @see ProcedureInterface::PROCEDURE_PHASE_PERMISSIONSET_HIDDEN,
     * @see ProcedureInterface::PROCEDURE_PHASE_PERMISSIONSET_READ,
     * @see ProcedureInterface::PROCEDURE_PHASE_PERMISSIONSET_WRITE}
     */
    public function setPermissionSet(string $permissionSet): void;

    public function getParticipationState(): ?string;

    /**
     * @param string|null $participationState one of {
     *
     * @see ProcedureInterface::PARTICIPATIONSTATE_FINISHED,
     * @see ProcedureInterface::PARTICIPATIONSTATE_PARTICIPATE_WITH_TOKEN} or null if not set
     */
    public function setParticipationState(?string $participationState): void;

    public function isClosingPhase(): bool;

    public function setClosingPhase(bool $closingPhase): void;

    public function getOrderInAudience(): int;

    public function setOrderInAudience(int $orderInAudience): void;

    public function getCustomer(): ?CustomerInterface;

    public function setCustomer(?CustomerInterface $customer): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;
}
