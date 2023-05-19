<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface DraftStatementFileInterface extends UuidEntityInterface
{
    public function getDraftStatement(): ?DraftStatementInterface;

    /**
     * Set to null to activate orphan removal.
     */
    public function setDraftStatement(?DraftStatementInterface $draftStatement): self;

    public function getCreateDate(): DateTime;

    public function getFile(): FileInterface;

    public function setFile(FileInterface $file): self;

    public function getFileString(): ?string;

}