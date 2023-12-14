<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Exceptions\ViolationsExceptionInterface;

interface ResourceTypeServiceInterface
{
    /**
     * Validates the given object using the annotations defined on its properties/getters.
     *
     * @param array<int,string>|null $groups the groups to validate against. If no groups are given
     *                                       the `Default` group will be used, which considers only
     *                                       constraints that are not part of any other group.
     *
     * @throws ViolationsExceptionInterface thrown if the validation found violations
     *
     * @see https://symfony.com/doc/4.4/validation/groups.html
     */
    public function validateObject(object $entity, array $groups = null): void;
}
