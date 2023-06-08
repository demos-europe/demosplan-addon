<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ProcedureTypeInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const BAULEITPLANUNG = 'Bauleitplanung';

    public function getName(): string;

    public function setName(string $name): void;

    public function addProcedure(ProcedureInterface $procedure): void;

    public function getStatementFormDefinition(): StatementFormDefinitionInterface;

    public function getProcedureBehaviorDefinition(): ProcedureBehaviorDefinitionInterface;

    public function getProcedureUiDefinition(): ProcedureUiDefinitionInterface;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;
}