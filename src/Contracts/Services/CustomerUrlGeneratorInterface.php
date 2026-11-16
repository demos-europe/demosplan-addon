<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;

/**
 * Generates absolute urls that point to the host of a given customer.
 *
 * Outside of a request (workers, console commands) the router only knows the host of its static
 * context, which is the same for all customers. Use this interface whenever an absolute url for a
 * specific customer has to be generated there.
 */
interface CustomerUrlGeneratorInterface
{
    /**
     * Without a customer (or a customer without subdomain) the url is generated with the
     * unchanged router context.
     *
     * @param array<string, mixed> $parameters
     */
    public function generate(?CustomerInterface $customer, string $route, array $parameters = []): string;
}
