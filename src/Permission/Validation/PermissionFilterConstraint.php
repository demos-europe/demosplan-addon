<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Validation;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PermissionFilterConstraint extends Constraint
{
    public function validatedBy(): string
    {
        return PermissionFilterConstraintValidator::class;
    }
}
