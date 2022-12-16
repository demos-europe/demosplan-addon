<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class UserHasAnyRole extends AbstractCondition
{
    /**
     * @var non-empty-list<non-empty-string>
     */
    private array $roleCodes;

    /**
     * @param non-empty-list<non-empty-string> $roleCodes
     */
    public function __construct(array $roleCodes)
    {
        $this->roleCodes = $roleCodes;
    }

    public function toCondition(): array
    {
        return [
            $this->createRandomName() => [
                'condition' => [
                    'path' => 'roleInCustomers.role.code',
                    'operator' => 'IN',
                    'value' => $this->roleCodes,
                ],
            ],
        ];
    }

}
