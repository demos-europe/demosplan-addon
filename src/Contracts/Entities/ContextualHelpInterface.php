<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ContextualHelpInterface extends UuidEntityInterface
{
    /**
     * Set ident.
     *
     * @param string|null $ident
     *
     * @return ContextualHelpInterface
     */
    public function setIdent($ident);

    /**
     * Set key.
     *
     * @param string $key
     *
     * @return ContextualHelpInterface
     */
    public function setKey($key);

    /**
     * get key.
     *
     * @return string
     */
    public function getKey();

    /**
     * Set text.
     *
     * @param string $text
     *
     * @return ContextualHelpInterface
     */
    public function setText($text);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param DateTime $createDate
     *
     * @return ContextualHelpInterface
     */
    public function setCreateDate($createDate);

    /**
     * @return DateTime
     */
    public function getCreateDate();

    /**
     * @param DateTime $modifyDate
     *
     * @return ContextualHelpInterface
     */
    public function setModifyDate($modifyDate);

    /**
     * @return DateTime
     */
    public function getModifyDate();
}
