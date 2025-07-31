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

interface CustomerServiceInterface
{
    public function findCustomerById(string $id): CustomerInterface;
    public function findCustomersByIds(array $ids): array;
    public function findCustomerBySubdomain(string $subdomain): CustomerInterface;
    public function getCurrentCustomer(): CustomerInterface;
    public function updateCustomer(CustomerInterface $customer): CustomerInterface;
    public function createCustomer(string $name, string $subdomain): CustomerInterface;
    public function getReservedCustomerNamesAndSubdomains(): array;
}
