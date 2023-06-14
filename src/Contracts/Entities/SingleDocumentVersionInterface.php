<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface SingleDocumentVersionInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * Set procedure.
     *
     * @param ProcedureInterface $procedure
     */
    public function setProcedure($procedure): self;

    /**
     * Get procedure.
     *
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * Get pId.
     *
     * @return string
     */
    public function getPId();

    /**
     * Get elementId.
     *
     * @return string
     */
    public function getElementId();

    /**
     * @return ElementsInterface|null
     */
    public function getElement();

    /**
     * @param ElementsInterface $element
     */
    public function setElement($element);

    /**
     * Set eCategory.
     *
     * @param string $category
     */
    public function setCategory($category): void;

    /**
     * Get eCategory.
     *
     * @return string
     */
    public function getCategory();

    /**
     * Set eTitle.
     *
     * @param string $title
     */
    public function setTitle($title): void;

    /**
     * Get eTitle.
     */
    public function getTitle(): string;

    /**
     * Set eText.
     *
     * @param string $text
     */
    public function setText($text): void;

    /**
     * Get eText.
     *
     * @return string
     */
    public function getText();

    /**
     * @return string
     */
    public function getSymbol();

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol);

    /**
     * @return string
     */
    public function getDocument();

    /**
     * @param string $document
     */
    public function setDocument($document);

    /**
     * Set eOrder.
     *
     * @param int $order
     */
    public function setOrder($order): void;

    /**
     * Get eOrder.
     *
     * @return int
     */
    public function getOrder();

    /**
     * @return bool
     */
    public function isStatementEnabled();

    /**
     * @param bool $statementEnabled
     */
    public function setStatementEnabled($statementEnabled);

    /**
     * Set eEnabled.
     */
    public function setVisible(bool $visible): void;

    /**
     * Get eEnabled.
     *
     * @return bool
     */
    public function getVisible();

    /**
     * Set eDeleted.
     *
     * @param bool $deleted
     */
    public function setDeleted($deleted): void;

    /**
     * Get eDeleted.
     *
     * @return bool
     */
    public function getDeleted();

    /**
     * Set eCreateDate.
     *
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate): void;

    /**
     * Get eCreateDate.
     *
     * @return DateTime
     */
    public function getCreateDate();

    /**
     * Set eModifyDate.
     *
     * @param DateTime $modifyDate
     */
    public function setModifyDate($modifyDate): void;

    /**
     * Get eModifyDate.
     *
     * @return DateTime
     */
    public function getModifyDate();

    /**
     * Set eDeleteDate.
     *
     * @param DateTime $deleteDate
     */
    public function setDeleteDate($deleteDate): void;

    /**
     * Get eDeleteDate.
     *
     * @return DateTime
     */
    public function getDeleteDate();

    /**
     * @return SingleDocumentInterface|null
     */
    public function getSingleDocument();

    public function getSingleDocumentId();

    /**
     * @param SingleDocumentInterface $singleDocument
     */
    public function setSingleDocument($singleDocument);

}
