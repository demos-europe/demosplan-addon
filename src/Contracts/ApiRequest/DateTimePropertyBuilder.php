<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use EDT\JsonApi\Properties\Attributes\CallbackAttributeReadability;
use EDT\JsonApi\RequestHandling\ContentField;
use EDT\JsonApi\ResourceTypes\PropertyBuilder;
use EDT\Wrapping\Properties\AttributeReadabilityInterface;

class DateTimePropertyBuilder extends PropertyBuilder
{
    public function getAttributeReadability(): ?AttributeReadabilityInterface
    {
        if (ContentField::ID === $this->name) {
            return null;
        }
        if (!$this->readable || null !== $this->relationship) {
            return null;
        }

        if (null === $this->customReadCallback) {
            return new DateTimePathAttributeReadability(
                $this->entityClass,
                $this->getPropertyPath(),
                $this->defaultField,
                $this->propertyAccessor,
                $this->typeResolver
            );
        }

        return new CallbackAttributeReadability(
            $this->defaultField,
            $this->customReadCallback,
            $this->typeResolver
        );
    }
}
