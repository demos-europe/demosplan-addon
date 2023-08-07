<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Validation;

interface PermissionFilterValidatorInterface
{
    /**
     * @param mixed $filter the filter needs to correspond to a specific format, but just for the
     *                      validation any kind of value is allowed here
     *
     * @throws PermissionFilterException
     */
    public function validateFilter($filter): void;
}
