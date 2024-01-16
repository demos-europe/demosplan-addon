<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use Exception;

interface FileInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * This ident is used in filestrings to reference to the file entity.
     *
     * @param string $ident
     *
     * @return FileInterface
     */
    public function setIdent($ident);

    /**
     * @param string $hash
     *
     * @return FileInterface
     */
    public function setHash($hash);

    /**
     * @return string
     */
    public function getHash();

    /**
     * @param string $description
     *
     * @return FileInterface
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $path
     *
     * @return FileInterface
     */
    public function setPath($path);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @return string the path to the file including the hash (which is the filename)
     *
     * @throws Exception Thrown if the hash for this instance is
     * not a string, is an empty string, equals '..' or contains a slash ('/').
     */
    public function getFilePathWithHash(): string;

    /**
     * @return FileInterface
     */
    public function setFilename(?string $filename);

    public function getFilename(): string;

    public function getProcedure(): ?ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure): void;

    /**
     * @param string $tags
     *
     * @return FileInterface
     */
    public function setTags($tags);

    /**
     * @return string
     */
    public function getTags();

    /**
     * @param string $author
     *
     * @return FileInterface
     */
    public function setAuthor($author);

    /**
     * @return string|null
     */
    public function getAuthor();

    /**
     * @param string $application
     *
     * @return FileInterface
     */
    public function setApplication($application);

    /**
     * @return string
     */
    public function getApplication();

    /**
     * @param string $mimetype
     *
     * @return FileInterface
     */
    public function setMimetype($mimetype);

    /**
     * @return string
     */
    public function getMimetype();

    public function getSize(): int;

    public function setSize(int $size);

    /**
     * @param DateTime $created
     *
     * @return FileInterface
     */
    public function setCreated($created);

    /**
     * @return DateTime
     */
    public function getCreated();

    /**
     * @param DateTime $modified
     *
     * @return FileInterface
     */
    public function setModified($modified);

    /**
     * @return DateTime
     */
    public function getModified();

    /**
     * @param DateTime $validUntil
     *
     * @return FileInterface
     */
    public function setValidUntil($validUntil);

    /**
     * @return DateTime
     */
    public function getValidUntil();

    /**
     * @param bool $deleted
     *
     * @return FileInterface
     */
    public function setDeleted($deleted);

    public function getDeleted(): bool;

    /**
     * @param int $statDown
     *
     * @return FileInterface
     */
    public function setStatDown($statDown);

    /**
     * @return int
     */
    public function getStatDown();

    /**
     * @param bool $infected
     *
     * @return FileInterface
     */
    public function setInfected($infected);

    /**
     * @return bool
     */
    public function getInfected();

    /**
     * @param DateTime $lastVScan
     *
     * @return FileInterface
     */
    public function setLastVScan($lastVScan);

    /**
     * @return DateTime
     */
    public function getLastVScan();

    /**
     * @param bool $blocked
     *
     * @return FileInterface
     */
    public function setBlocked($blocked);

    /**
     * @return bool
     */
    public function getBlocked();

    /**
     * Build a string of file information used in legacy context.
     */
    public function getFileString(): string;

    /**
     * Get name.
     *
     * @deprecated use getFilename() instead
     *
     * @return string
     */
    public function getName();
}
