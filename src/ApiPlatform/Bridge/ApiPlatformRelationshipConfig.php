<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\ApiPlatform\Bridge;

use ApiPlatform\State\ProviderInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\ResourceType\DoctrineResourceType;
use EDT\JsonApi\InputHandling\RepositoryInterface;
use EDT\Wrapping\ResourceBehavior\ResourceInstantiability;
use EDT\Wrapping\Utilities\SchemaPathProcessor;
use League\Fractal\TransformerAbstract;
use LogicException;

/**
 * Configuration object for API Platform relationships in EDT context.
 *
 * This class fakes being an EDT DoctrineResourceType to satisfy the type system
 * when an EDT resource (e.g., Statement) has a relationship pointing to an
 * API Platform resource (e.g., Claim). It holds the API Platform metadata
 * (state provider, resource class, type name) that ExtendedDynamicTransformer
 * uses to bridge the two systems.
 *
 * TEMPORARY: This class exists only during the EDT-to-API Platform migration.
 * Once all ResourceTypes are converted to API Platform, this class will be removed.
 *
 * @template TEntity of EntityInterface
 *
 * @template-extends DoctrineResourceType<TEntity>
 */
class ApiPlatformRelationshipConfig extends DoctrineResourceType
{
    /**
     * @param string                $typeName      JSON:API type name (e.g., 'Claim')
     * @param class-string<TEntity> $entityClass   Entity class (e.g., User::class)
     * @param ProviderInterface     $stateProvider  API Platform state provider
     * @param class-string          $resourceClass API Platform resource DTO class
     */
    public function __construct(
        private readonly string $typeName,
        private readonly string $entityClass,
        private readonly ProviderInterface $stateProvider,
        private readonly string $resourceClass,
    ) {
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function getEntityClass(): string
    {
        return $this->entityClass;
    }

    public function getStateProvider(): ProviderInterface
    {
        return $this->stateProvider;
    }

    public function getResourceClass(): string
    {
        return $this->resourceClass;
    }

    public function isAvailable(): bool
    {
        return true;
    }

    public function isGetAllowed(): bool
    {
        return false;
    }

    public function isListAllowed(): bool
    {
        return false;
    }

    public function isCreateAllowed(): bool
    {
        return false;
    }

    public function isUpdateAllowed(): bool
    {
        return false;
    }

    public function isDeleteAllowed(): bool
    {
        return false;
    }

    /**
     * @return list<never>
     */
    protected function getProperties(): array
    {
        return [];
    }

    protected function getAccessConditions(): array
    {
        return [];
    }

    protected function getRepository(): RepositoryInterface
    {
        throw new LogicException(
            'ApiPlatformRelationshipConfig does not use an EDT repository. '
            . 'Data is provided by the API Platform StateProvider.'
        );
    }

    protected function getSchemaPathProcessor(): SchemaPathProcessor
    {
        throw new LogicException(
            'ApiPlatformRelationshipConfig does not use EDT schema path processing.'
        );
    }

    protected function getInstantiability(): ResourceInstantiability
    {
        throw new LogicException(
            'ApiPlatformRelationshipConfig does not support entity instantiation. '
            . 'Use an API Platform StateProcessor instead.'
        );
    }

    public function getIdentifierPropertyPath(): array
    {
        return ['id'];
    }

    public function getTransformer(): TransformerAbstract
    {
        throw new LogicException(
            'ApiPlatformRelationshipConfig.getTransformer() should never be called. '
            . 'ExtendedDynamicTransformer intercepts relationship creation based on '
            . 'instanceof check and routes to API Platform instead.'
        );
    }
}
