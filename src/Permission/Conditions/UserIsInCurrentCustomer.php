<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class UserIsInCurrentCustomer extends AbstractCondition
{
    public function toCondition(): array
    {
        return [
            $this->createRandomName() => [
                'parameterCondition' => [
                    'path' => 'roleInCustomers.customer.id',
                    'operator' => '=',
                    'value' => '$currentCustomerId',
                ]
            ],
        ];
    }
}
