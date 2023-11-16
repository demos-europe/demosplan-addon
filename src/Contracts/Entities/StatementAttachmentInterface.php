<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface StatementAttachmentInterface extends UuidEntityInterface
{
    /**
     * A file that originally resulted in the original statement being created. E.g. a PDF file
     * send via email.
     *
     * @var string
     */
    public const SOURCE_STATEMENT = 'source_statement';
    /**
     * Attachments with this type can have any kind of content. We can only speculate that it
     * may be legal documents from lawyers or reviewers, images or other files supporting the
     * statement.
     *
     * @var string
     */
    public const GENERIC = 'generic';

    public function getFile(): FileInterface;

    public function setFile(FileInterface $file): void;

    public function setId(string $id): void;

    public function getType(): string;

    public function setType(string $type): void;

    public function getStatement(): StatementInterface;

    public function setStatement(StatementInterface $statement): void;

}
