<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ProcedureUiDefinitionInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * The placeholder that may be used in {@link ProcedureUiDefinitionInterface::$statementPublicSubmitConfirmationText}.
     * Do not simply change the value of this constant without migrating the data in the database too.
     */
    public const STATEMENT_PUBLIC_SUBMIT_CONFIRMATION_TEXT_PLACEHOLDER = 'statementPublicSubmitConfirmationTextPlaceholder';

    public function getProcedure(): ?ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure): void;

    public function getProcedureType(): ?ProcedureTypeInterface;

    public function setProcedureType(ProcedureTypeInterface $procedureType): void;

    public function getMapHintDefault(): string;

    public function setMapHintDefault(string $mapHintDefault): void;

    public function getStatementFormHintStatement(): string;

    public function setStatementFormHintStatement(string $statementFormHintStatement): void;

    public function getStatementFormHintPersonalData(): string;

    public function setStatementFormHintPersonalData(string $statementFormHintPersonalData): void;

    public function getStatementFormHintRecheck(): string;

    public function setStatementFormHintRecheck(string $statementFormHintRecheck): void;

    public function getCreationDate(): DateTime;

    public function getModificationDate(): DateTime;

    public function getStatementPublicSubmitConfirmationText(): string;

    public function setStatementPublicSubmitConfirmationText(string $statementPublicSubmitConfirmationText): void;

}