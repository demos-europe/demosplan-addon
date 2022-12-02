<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Validation;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PermissionFilterConstraintValidator extends ConstraintValidator
{
    private PermissionFilterValidatorInterface $permissionFilterValidator;

    public function __construct(PermissionFilterValidatorInterface $permissionFilterValidator)
    {
        $this->permissionFilterValidator = $permissionFilterValidator;
    }

    /**
     * @param mixed                      $value
     * @param PermissionFilterConstraint $constraint
     */
    public function validate($value, Constraint $constraint): void
    {
        try {
            $this->permissionFilterValidator->validateFilter($value);
        } catch (PermissionFilterException $exception) {
            $this->context->buildViolation($exception->getMessage())->addViolation();
        }
    }
}
