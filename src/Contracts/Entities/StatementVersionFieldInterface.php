<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface StatementVersionFieldInterface extends UuidEntityInterface
{
    /**
     * Set uId.
     *
     * @param string $userIdent
     *
     * @return StatementVersionFieldInterface
     */
    public function setUserIdent($userIdent);

    /**
     * Get uId.
     *
     * @return string
     */
    public function getUserIdent();

    /**
     * Set uName.
     *
     * @param string $userName
     *
     * @return StatementVersionFieldInterface
     */
    public function setUserName($userName);

    /**
     * Get uName.
     *
     * @return string
     */
    public function getUserName();

    /**
     * Set sId.
     *
     * @param string $sessionIdent
     *
     * @return StatementVersionFieldInterface
     */
    public function setSessionIdent($sessionIdent);

    /**
     * Get sId.
     *
     * @return string
     */
    public function getSessionIdent();

    /**
     * Set svName.
     *
     * @param string $name
     *
     * @return StatementVersionFieldInterface
     */
    public function setName($name);

    /**
     * Get svName.
     *
     * @return string
     */
    public function getName();

    /**
     * Set svType.
     *
     * @param string $type
     *
     * @return StatementVersionFieldInterface
     */
    public function setType($type);

    /**
     * Get svType.
     *
     * @return string
     */
    public function getType();

    /**
     * Set svValue.
     *
     * @param string $value
     *
     * @return StatementVersionFieldInterface
     */
    public function setValue($value);

    /**
     * Get svValue.
     *
     * @return string
     */
    public function getValue();

    /**
     * Set svCreatedDate.
     *
     * @param DateTime $created
     *
     * @return StatementVersionFieldInterface
     */
    public function setCreated($created);

    /**
     * Get svCreatedDate.
     *
     * @return DateTime
     */
    public function getCreated();

    /**
     * Set st.
     *
     * @param StatementInterface $statement
     *
     * @return StatementVersionFieldInterface
     */
    public function setStatement(StatementInterface $statement = null);

    /**
     * Get st.
     *
     * @return StatementInterface
     */
    public function getStatement();

    /**
     * @return string
     */
    public function getStatementIdent();

}