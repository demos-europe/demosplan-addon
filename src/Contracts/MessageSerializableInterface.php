<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

interface MessageSerializableInterface
{
    public function getSeverity(): string;

    public function setSeverity(string $severity): MessageSerializableInterface;

    public function getText(): string;

    public function setText(string $text): MessageSerializableInterface;

    public function getTextParameters(): array;

    public function setTextParameters(array $textParameters);

}
