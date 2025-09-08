<?php

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\BoilerplateInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\TagInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\TagTopicInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\NonUniqueResultException;
use EDT\Querying\Contracts\PathException;
use Exception;
use InvalidArgumentException;

interface TagServiceInterface
{
    /**
     * Returns the topic with the given Id.
     *
     * @param string $id
     */
    public function getTopic($id): ?TagTopicInterface;

    /**
     * Returns a single Tag.
     *
     * @param string $id - identifies the Tag
     *
     * @return TagInterface|null
     */
    public function getTag($id);

    /**
     * Creates a new Tag with the given title.
     *
     * @throws Exception DuplicatedTagTitleException
     */
    public function createTag(string $title, TagTopicInterface $topic, bool $persistAndFlush = true): TagInterface;

    /**
     * Creates a new TagTopic with the given title.
     *
     * @param string $title - Title of the new topic
     *
     * @throws Exception DuplicatedTagTopicTitleException
     */
    public function createTagTopic($title, ProcedureInterface $procedure, bool $persistAndFlush = true): TagTopicInterface;

    /**
     * @param string $title
     *
     * @throws Exception DuplicatedTagTopicTitleException
     */
    public function assertTitleNotDuplicated($title, ProcedureInterface $procedure): void;

    /**
     * Moves a specific Tag to a specific Topic.
     * Because a Tag can have one Topic only, it is necessary to remove this Tag from the current Topic (if exists).
     *
     * @param TagInterface      $tag
     * @param TagTopicInterface $newTopic
     *
     * @return bool True if both tag and topic were successfully updated
     */
    public function moveTagToTopic($tag, $newTopic): bool;

    /**
     * Attach a BoilerplateText to a tag.
     *
     * @param TagInterface $tag
     * @param BoilerplateInterface $boilerplate
     *
     * @throws Exception
     */
    public function attachBoilerplateToTag($tag, $boilerplate);

    /**
     * Detach a BoilerplateText from a tag.
     *
     * @param TagInterface $tag
     * @param BoilerplateInterface $boilerplate
     *
     * @throws Exception
     */
    public function detachBoilerplateFromTag($tag, $boilerplate);

    /**
     * Renames a topic.
     *
     * @param string $id
     * @param string $name
     *
     * @return TagTopicInterface|false
     */
    public function renameTopic($id, $name);

    /**
     * Renames a tag.
     *
     * @param string $id
     * @param string $name
     *
     * @return TagInterface|false
     */
    public function renameTag($id, $name);

    /**
     * Deletes a Tag.
     *
     * @param TagInterface $tag
     *
     * @throws InvalidArgumentException
     */
    public function deleteTag($tag): bool;

    /**
     * Deletes a Topic.
     *
     * @param TagTopicInterface $topic
     *
     * @throws EntityNotFoundException
     */
    public function deleteTopic($topic): bool;

    /**
     * @return array<int,TagTopicInterface>
     */
    public function getTagTopicsByTitle(ProcedureInterface $procedure, string $tagTopicTitle): array;

    /**
     * This method will attempt to find a unique {@link TagInterface} by the given tag title and {@link ProcedureInterface}
     * ID, even though multiple tags may exist within different {@link TagTopicInterface}s.
     *
     * @throws NonUniqueResultException thrown if multiple tags were found
     * @throws PathException            thrown if the property names in the entities were changed without adjusting this method
     */
    public function findUniqueByTitle(string $tagTitle, string $procedureId): ?TagInterface;

    public function findOneTopicByTitle(string $title, string $procedureId): ?TagTopicInterface;

    /**
     * @param array<int, string> $ids
     *
     * @return array<int, TagInterface>
     */
    public function findByIds(array $ids): array;
}