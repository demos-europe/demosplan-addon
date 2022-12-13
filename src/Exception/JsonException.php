<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Exception;

class JsonException extends \JsonException
{
    public static function decodeFailed(): self
    {
        return new self('Failed to decode json: ' . json_last_error_msg());
    }

    public static function encodeFailed(): self
    {
        return new self('Failed to encode to json: ' . json_last_error_msg());
    }
}

