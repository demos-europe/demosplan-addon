<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface OriginalStatementAnonymizationInterface
{
    public function getId(): string;
    public function getCreated(): DateTime;

    public function isAttachmentsDeleted(): bool;

    public function setAttachmentsDeleted(bool $attachmentsDeleted): void;

    public function isTextVersionHistoryDeleted(): bool;

    public function setTextVersionHistoryDeleted(bool $textVersionHistoryDeleted): void;

    public function isTextPassagesAnonymized(): bool;

    public function setTextPassagesAnonymized(bool $textPassagesAnonymized): void;

    public function getStatement(): StatementInterface;

    public function setStatement(StatementInterface $statement): void;

    public function getCreatedBy(): UserInterface;

    public function setCreatedBy(UserInterface $createdBy): void;

    public function isSubmitterAndAuthorMetaDataAnonymized(): bool;

    public function setSubmitterAndAuthorMetaDataAnonymized(bool $submitterAndAuthorMetaDataAnonymized): void;

}
