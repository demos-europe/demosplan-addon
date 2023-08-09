<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\PropertyBuilder;
use EDT\JsonApi\ResourceTypes\PropertyBuilderFactory;
use EDT\Querying\Contracts\PathException;
use EDT\Querying\Contracts\PropertyPathInterface;

class DplanPropertyBuilderFactory extends PropertyBuilderFactory
{
    /**
     * @template TEntity of object
     *
     * @param class-string<TEntity> $entityClass
     * @param PropertyPathInterface $path
     *
     * @return PropertyBuilder<TEntity, mixed, ClauseFunctionInterface<bool>, OrderBySortMethodInterface>
     *
     * @throws PathException
     */
    public function createDateTimeAttribute(string $entityClass, PropertyPathInterface $path): PropertyBuilder
    {
        return new DateTimePropertyBuilder(
            $path,
            $entityClass,
            null,
            $this->propertyAccessor,
            $this->typeResolver
        );
    }
}
