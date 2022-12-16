<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

abstract class AbstractGroupCondition extends AbstractCondition
{
    /**
     * @var list<AbstractCondition>
     */
    private array $conditions;

    /**
     * @param list<AbstractCondition> $conditions
     */
    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }

    public function toCondition(): array
    {
        $conditionName = $this->createRandomName();
        $nestedFilters = array_map(
            static fn (AbstractCondition $condition): array => $condition->toSubCondition($conditionName),
            $this->conditions
        );

        return array_merge(
            [
                $conditionName => [
                    'group' => [
                        'conjunction' => $this->getConjunction(),
                    ],
                ]
            ],
            ...$nestedFilters
        );
    }

    abstract protected function getConjunction(): string;
}
