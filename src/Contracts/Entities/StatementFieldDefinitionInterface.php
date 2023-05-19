<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface StatementFieldDefinitionInterface extends UuidEntityInterface
{
    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;

    public function getName(): string;

    public function getId(): ?string;

    public function getStatementFormDefinition(): StatementFormDefinitionInterface;

    public function isRequired(): bool;

    public function setRequired(bool $required): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;

    public function getOrderNumber(): int;

}