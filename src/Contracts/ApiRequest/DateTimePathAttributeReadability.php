<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use Carbon\Carbon;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\JsonApi\Properties\Attributes\PathAttributeReadability;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends PathAttributeReadability<TEntity>
 */
class DateTimePathAttributeReadability extends PathAttributeReadability
{
    protected function assertValidValue(mixed $attributeValue): int|float|string|bool|array|null
    {
        if ($attributeValue instanceof \DateTime) {
            return Carbon::instance($attributeValue)->toIso8601String();
        }

        return parent::assertValidValue($attributeValue);
    }
}
