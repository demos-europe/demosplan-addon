<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface ParagraphVersionInterface extends UuidEntityInterface, CoreEntityInterface
{
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
     * @return ParagraphInterface
     */
    public function getParagraph();

    /**
     * @param ParagraphInterface $paragraph
     */
    public function setParagraph($paragraph);

    /**
     * Set procedure.
     *
     * @param ProcedureInterface $procedure
     *
     * @return ParagraphVersionInterface
     */
    public function setProcedure($procedure);

    /**
     * Get procedure.
     *
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * Get procedureId.
     *
     * @return string
     */
    public function getPId();

    /**
     * Set eCategory.
     *
     * @param string $category
     *
     * @return ParagraphVersionInterface
     */
    public function setCategory($category);

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
     *
     * @return ParagraphVersionInterface
     */
    public function setTitle($title);

    /**
     * Get eTitle.
     */
    public function getTitle(): string;

    /**
     * Set eText.
     *
     * @param string $text
     *
     * @return ParagraphVersionInterface
     */
    public function setText($text);

    /**
     * Get eText.
     *
     * @return string
     */
    public function getText();

    /**
     * Set eOrder.
     *
     * @param int $order
     *
     * @return ParagraphVersionInterface
     */
    public function setOrder($order);

    /**
     * Get eOrder.
     *
     * @return int
     */
    public function getOrder();

    /**
     * Set eEnabled.
     *
     * @param bool $visible
     *
     * @return ParagraphVersionInterface
     */
    public function setVisible($visible);

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
     *
     * @return ParagraphVersionInterface
     */
    public function setDeleted($deleted);

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
     *
     * @return ParagraphVersionInterface
     */
    public function setCreateDate($createDate);

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
     *
     * @return ParagraphVersionInterface
     */
    public function setModifyDate($modifyDate);

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
     *
     * @return ParagraphVersionInterface
     */
    public function setDeleteDate($deleteDate);

    /**
     * Get eDeleteDate.
     *
     * @return DateTime
     */
    public function getDeleteDate();

}
