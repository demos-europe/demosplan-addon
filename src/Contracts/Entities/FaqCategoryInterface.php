<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface FaqCategoryInterface extends UuidEntityInterface
{
    /**
     * These are allowed types, independent of the role.
     */
    final public const FAQ_CATEGORY_TYPES_MANDATORY = [
        'system',
        'technische_voraussetzung',
        'bedienung',
        'oeb_bauleitplanung',
        'oeb_bob',
    ];

    /**
     * These are role-dependent types.
     */
    final public const FAQ_CATEGORY_TYPES_OPTIONAL = 'custom_category';

    /**
     * @param string $title
     */
    public function setTitle($title): self;

    public function getTitle(): string;

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate): self;

    public function getCreateDate(): DateTime;

    /**
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate): self;

    public function getModifyDate(): DateTime;
}