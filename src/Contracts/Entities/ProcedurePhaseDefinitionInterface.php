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
     * @param string $permissionSet one of {'hidden', 'read', 'write'}
     */
    public function setPermissionSet(string $permissionSet): void;

    public function getParticipationState(): ?string;

    /**
     * @param string|null $participationState one of {'finished', 'participateWithToken'} or null if not set
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
