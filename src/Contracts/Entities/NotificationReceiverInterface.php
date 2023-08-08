<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface NotificationReceiverInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string $label
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getProcedure();

    /**
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail($email);
}
