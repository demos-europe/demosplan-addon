<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;
use League\Fractal\Resource\ArrayCollection;

interface TagInterface extends UuidEntityInterface
{
    /**
     * @param string $id
     */
    public function setId($id);

    public function getTopic(): TagTopicInterface;

    /**
     * @return string
     */
    public function getTopicTitle();

    /**
     * Assign this Tag to a specific TagTopic.
     * Because a Tag can have one Topic only, it is necessary to remove this Tag from the current Topic (if exists).
     * Add this Tag to the given Topic and save the information of relation in this object.
     *
     * @param TagTopicInterface $newTopic
     *
     * @return TagInterface $this
     */
    public function setTopic($newTopic);

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
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @return ProcedureInterface
     *
     * @deprecated Only needed for Elasticsearch indexing. Use {@link TagTopicInterface::getProcedure()} instead.
     */
    public function getProcedure();

    /**
     * Add Statement.
     *
     * @param StatementInterface $statement
     *
     * @return bool - true if the given statement was added to this tag, otherwise false
     */
    public function addStatement($statement);

    /**
     * Sets the boilerplate text that is associated to this tag.
     *
     * @param BoilerplateInterface|null $boilerplate
     */
    public function setBoilerplate($boilerplate);

    /**
     * Returns the boilerplate text that is associated with this tag.
     *
     * @return BoilerplateInterface|null
     */
    public function getBoilerplate();

    /**
     * Determines if this Tag has a boilerplate.
     *
     * @return bool - true there are a boilerplate, otherwise false
     */
    public function hasBoilerplate();

    /**
     * @return ArrayCollection
     */
    public function getStatements();

    /**
     * @param ArrayCollection $statements
     */
    public function setStatements($statements);

    /**
     * @param DateTime $date
     */
    public function setCreateDate($date);

}
