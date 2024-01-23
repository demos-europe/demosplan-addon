<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Validation;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

class PermissionFilterConstraintValidator extends ConstraintValidator
{
    private PermissionFilterValidatorInterface $permissionFilterValidator;

    public function __construct(PermissionFilterValidatorInterface $permissionFilterValidator)
    {
        $this->permissionFilterValidator = $permissionFilterValidator;
    }

    /**
     * @param mixed $value
     */
    public function validate($value, Constraint $constraint): void
    {
        Assert::isInstanceOf($constraint, PermissionFilterConstraint::class);

        try {
            $this->permissionFilterValidator->validateFilter($value);
        } catch (PermissionFilterException $exception) {
            $this->context->buildViolation($exception->getMessage())->addViolation();
        }
    }
}
