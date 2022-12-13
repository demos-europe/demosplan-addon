<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

use DemosEurope\DemosplanAddon\Permission\ResolvablePermissionCollectionInterface;
use Ramsey\Uuid\Uuid;
use function array_key_exists;

/**
 * @phpstan-import-type PermissionFilter from ResolvablePermissionCollectionInterface
 */
abstract class AbstractCondition
{
    /**
     * @param non-empty-string $memberOf
     *
     * @return array<non-empty-string, PermissionFilter>
     */
    public function toSubCondition(string $memberOf): array
    {
        $conditions = $this->toCondition();

        $firstConditionName = array_key_first($conditions);
        $type = array_key_first($conditions[$firstConditionName]);

        $conditions[$firstConditionName][$type]['memberOf'] = $memberOf;

        return $conditions;
    }

    /**
     * @return array<non-empty-string, PermissionFilter>
     */
    abstract public function toCondition(): array;

    /**
     * @return non-empty-string
     */
    protected function createRandomName(string $prefix = 'c_'): string
    {
        $conditionName = Uuid::uuid4()->toString();

        return "$prefix$conditionName";
    }
}
