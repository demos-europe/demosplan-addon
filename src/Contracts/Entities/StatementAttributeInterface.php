<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface StatementAttributeInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id);

    /**
     * @return StatementInterface
     */
    public function getStatement();

    /**
     * @param StatementInterface $statement
     *
     * @return $this
     */
    public function setStatement($statement);

    /**
     * @return DraftStatementInterface
     */
    public function getDraftStatement();

    /**
     * @param DraftStatementInterface $draftStatement
     *
     * @return $this
     */
    public function setDraftStatement($draftStatement);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getValue();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value);

}
