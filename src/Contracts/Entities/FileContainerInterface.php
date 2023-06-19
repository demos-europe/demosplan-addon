<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface FileContainerInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getEntityId();

    /**
     * @param string $entityId
     */
    public function setEntityId($entityId);

    /**
     * @return string
     */
    public function getEntityField();

    /**
     * @param string $entityField
     */
    public function setEntityField($entityField);

    /**
     * @return string
     */
    public function getEntityClass();

    /**
     * @param string $entityClass
     */
    public function setEntityClass($entityClass);

    /**
     * @return DateTime
     */
    public function getCreateDate();

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate);

    /**
     * @return DateTime
     */
    public function getModifyDate();

    /**
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate);

    /**
     * @return int
     */
    public function getOrder();

    /**
     * @param int $order
     */
    public function setOrder($order);

    /**
     * @return string
     */
    public function getFileString();

    /**
     * @param string $fileString
     */
    public function setFileString($fileString);

    /**
     * @return FileInterface
     */
    public function getFile();

    /**
     * @param FileInterface $file
     */
    public function setFile($file);

    /**
     * @param bool $publicAllowed
     *
     * @return $this
     */
    public function setPublicAllowed($publicAllowed);

    /**
     * @return bool
     */
    public function getPublicAllowed();

}