<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTimeInterface;


interface DraftStatementFileInterface extends UuidEntityInterface
{
    public function getDraftStatement(): ?DraftStatementInterface;

    /**
     * Set to null to activate orphan removal.
     */
    public function setDraftStatement(?DraftStatementInterface $draftStatement): self;

    public function getCreateDate(): DateTimeInterface;

    public function getFile(): FileInterface;

    public function setFile(FileInterface $file): self;

    public function getFileString(): ?string;

}