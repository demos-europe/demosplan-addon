<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use DateTime;

interface TagTopicInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const TAG_TOPIC_MISC = 'Sonstiges';

    /**
     * @return Collection<int, TagInterface>
     */
    public function getTags(): Collection;

    /**
     * Returns a specific tag of this topic, if exists.
     *
     * @param string $id identifies the tag
     *
     * @return TagInterface|null
     */
    public function getTag($id);

    /**
     * Add a specific Tag to this Topic.
     *
     * @param TagInterface $tag
     *
     * @return TagTopicInterface
     */
    public function addTag($tag);

    /**
     * Removes a specific Tag from this Topic.
     *
     * @param TagInterface $tag
     *
     * @return TagTopicInterface
     */
    public function removeTag($tag);

    /**
     * @param string|null $id
     */
    public function setId($id): self;

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     *
     * @deprecated use {@link getTitle} instead
     */
    public function getName();

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return string
     * @return TagTopicInterface
     */
    public function setTitle($title);

    /**
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure);
}
