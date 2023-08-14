<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ApiDocumentation\AttributeTypeResolver;
use EDT\JsonApi\ResourceTypes\PropertyBuilder;
use EDT\JsonApi\ResourceTypes\PropertyBuilderFactory;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\Querying\Contracts\PathException;
use EDT\Querying\Contracts\PropertyAccessorInterface;
use EDT\Querying\Contracts\PropertyPathInterface;
use EDT\Wrapping\Contracts\TypeProviderInterface;

/**
 * @template-extends PropertyBuilderFactory<ClauseFunctionInterface<bool>, OrderBySortMethodInterface>
 */
class DplanPropertyBuilderFactory extends PropertyBuilderFactory
{
    public function __construct(
        PropertyAccessorInterface $propertyAccessor,
        AttributeTypeResolver $typeResolver,
        protected readonly TypeProviderInterface $typeProvider
    ) {
        parent::__construct($propertyAccessor, $typeResolver);
    }

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

    public function createToOne(
        string $entityClass,
        PropertyPathInterface&ResourceTypeInterface $path,
        bool $defaultInclude
    ): PropertyBuilder {
        // Even though $path is already a ResourceTypeInterface, it is not the actual
        // instance but one that was created via reflection for path purposes only and thus not
        // sufficient for further processing.
        $relationshipType = $this->typeProvider->getTypeByIdentifier($path->getTypeName());

        return new PropertyBuilder(
            $path,
            $entityClass,
            [
                'relationshipType' => $relationshipType,
                'defaultInclude' => $defaultInclude,
                'toMany' => false,
            ],
            $this->propertyAccessor,
            $this->typeResolver
        );
    }

    public function createToMany(
        string $entityClass,
        PropertyPathInterface&ResourceTypeInterface $path,
        bool $defaultInclude = false
    ): PropertyBuilder {
        // Even though $path is already a ResourceTypeInterface, it is not the actual
        // instance but one that was created via reflection for path purposes only and thus not
        // sufficient for further processing.
        $relationshipType = $this->typeProvider->getTypeByIdentifier($path->getTypeName());

        return new PropertyBuilder(
            $path,
            $entityClass,
            [
                'relationshipType' => $relationshipType,
                'defaultInclude' => $defaultInclude,
                'toMany' => true,
            ],
            $this->propertyAccessor,
            $this->typeResolver
        );
    }
}
