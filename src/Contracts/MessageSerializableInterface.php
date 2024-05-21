<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

interface MessageSerializableInterface
{
    public function getSeverity(): string;

    /**
     * @param string $severity
     */
    public function setSeverity($severity): MessageSerializableInterface;

    public function getText(): string;

    /**
     * @param string $text
     */
    public function setText($text): MessageSerializableInterface;

    public function getTextParameters(): array;

    /**
     * @param array $textParameters
     */
    public function setTextParameters($textParameters);

}
