<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

interface MessageSerializableInterface
{
    /**
     * @return string
     */
    public function getSeverity(): string;

    /**
     * @param string $severity
     *
     * @return MessageSerializableInterface
     */
    public function setSeverity(string $severity): MessageSerializableInterface;

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @param string $text
     *
     * @return MessageSerializableInterface
     */
    public function setText(string $text): MessageSerializableInterface;

    /**
     * @return array
     */
    public function getTextParameters(): array;

    /**
     * @param array $textParameters
     */
    public function setTextParameters(array $textParameters);

}
