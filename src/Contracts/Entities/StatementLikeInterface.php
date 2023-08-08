<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface StatementLikeInterface extends UuidEntityInterface
{
    /**
     * @param string $id
     *
     * @return StatementLikeInterface
     */
    public function setId($id);

    /**
     * @return StatementInterface
     */
    public function getStatement();

    /**
     * @param StatementInterface $statement
     *
     * @return StatementLikeInterface
     */
    public function setStatement($statement);

    /**
     * @return UserInterface
     */
    public function getUser();

    /**
     * @param UserInterface $user
     *
     * @return StatementLikeInterface
     */
    public function setUser($user);

    /**
     * @return DateTime
     */
    public function getCreatedDate();

    /**
     * @param DateTime $createdDate
     *
     * @return StatementLikeInterface
     */
    public function setCreatedDate($createdDate);

}
