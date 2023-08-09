<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use Carbon\Carbon;
use EDT\JsonApi\Properties\Attributes\PathAttributeReadability;

class DateTimePathAttributeReadability extends PathAttributeReadability
{
    protected function assertValidValue(mixed $attributeValue): int|float|string|bool|array|null|\DateTime
    {
        if ($attributeValue instanceof \DateTime) {
            return Carbon::instance($attributeValue)->toIso8601String();
        }

        return parent::assertValidValue($attributeValue);
    }
}
