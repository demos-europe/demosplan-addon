<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

/**
 * Interface ApiClientInterface.
 */
interface ApiClientInterface
{
    public const POST = 'post';
    public const GET = 'get';

    /**
     * By now, support for post and get methods.
     */
    public function request(string $url, array $options, string $method): string;
}
