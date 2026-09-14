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

use ApiPlatform\Metadata\Get;
use ApiPlatform\State\ProviderInterface;
use EDT\JsonApi\OutputHandling\DynamicTransformer;
use EDT\JsonApi\RequestHandling\MessageFormatter;
use EDT\Wrapping\Contracts\Types\TransferableTypeInterface;
use EDT\Wrapping\ResourceBehavior\ResourceReadability;
use Exception;
use League\Fractal\TransformerAbstract;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Extended DynamicTransformer that bridges EDT to API Platform for specific relationships.
 *
 * This allows gradual migration from EDT to API Platform by:
 * - Keeping the parent resource in EDT (uses this transformer)
 * - Using API Platform resources for specific relationships
 * - No EDT ResourceType needed for the API Platform side
 *
 * How it works:
 * 1. Parent resource uses this transformer (via ResourceType.getTransformer())
 * 2. When a relationship is included, createRelationshipTransformer() is called
 * 3. If the relationship type is ApiPlatformRelationshipConfig, an inline
 *    API Platform transformer is returned instead of an EDT DynamicTransformer
 * 4. The inline transformer uses the StateProvider to get the resource data
 * 5. For non-API Platform relationships, falls through to parent EDT logic
 *
 * TEMPORARY: This class exists only during the EDT-to-API Platform migration.
 * Once all ResourceTypes are converted to API Platform, this class will be removed.
 *
 * @template TEntity of object
 * @template TCondition of \EDT\DqlQuerying\Contracts\ClauseFunctionInterface<bool>
 * @template TSorting of \EDT\DqlQuerying\Contracts\OrderBySortMethodInterface
 *
 * @template-extends DynamicTransformer<TEntity, TCondition, TSorting>
 */
class ExtendedDynamicTransformer extends DynamicTransformer
{
    public function __construct(
        string $typeName,
        string $entityClass,
        ResourceReadability $readability,
        MessageFormatter $messageFormatter,
        ?LoggerInterface $logger,
        private readonly ?NormalizerInterface $normalizer,
    ) {
        parent::__construct($typeName, $entityClass, $readability, $messageFormatter, $logger);
    }

    /**
     * Override to support API Platform resources as relationship targets.
     *
     * Vendor: EDT\JsonApi\OutputHandling\DynamicTransformer::createRelationshipTransformer()
     */
    protected function createRelationshipTransformer(TransferableTypeInterface $relationshipType): TransformerAbstract
    {
        if ($relationshipType instanceof ApiPlatformRelationshipConfig) {
            return $this->createApiPlatformTransformer(
                $relationshipType->getStateProvider(),
                $relationshipType->getResourceClass(),
                $relationshipType->getTypeName(),
            );
        }

        return parent::createRelationshipTransformer($relationshipType);
    }

    /**
     * Create an inline Fractal transformer that bridges to API Platform.
     *
     * The returned transformer:
     * 1. Receives the related entity from EDT
     * 2. Calls the API Platform StateProvider to get the resource DTO
     * 3. Normalizes the DTO using Symfony's serializer (same as API Platform endpoints)
     * 4. Returns a flat array for Fractal
     */
    private function createApiPlatformTransformer(
        ProviderInterface $stateProvider,
        string $resourceClass,
        string $typeName,
    ): TransformerAbstract {
        $normalizer = $this->normalizer;

        return new class($stateProvider, $normalizer, $resourceClass, $typeName) extends TransformerAbstract {
            public function __construct(
                private readonly ProviderInterface $stateProvider,
                private readonly ?NormalizerInterface $normalizer,
                private readonly string $resourceClass,
                private readonly string $typeName,
            ) {
            }

            /**
             * Transform a related entity to API Platform resource data.
             *
             * @param object|null $entity The related entity (e.g., User for a Claim relationship)
             *
             * @return array The transformed data as a flat array for Fractal
             */
            public function transform($entity): array
            {
                if (null === $entity) {
                    return ['id' => null];
                }

                try {
                    $operation = new Get(
                        class: $this->resourceClass,
                        provider: $this->stateProvider::class,
                    );

                    $resource = $this->stateProvider->provide(
                        $operation,
                        ['id' => $entity->getId()],
                        [],
                    );

                    if (null === $resource) {
                        return ['id' => $entity->getId()];
                    }

                    if (null === $this->normalizer) {
                        return ['id' => $entity->getId()];
                    }

                    $normalized = $this->normalizer->normalize(
                        $resource,
                        'jsonapi',
                        [
                            'resource_class' => $this->resourceClass,
                            'operation'      => $operation,
                        ],
                    );

                    $data = [];
                    if (isset($normalized['data']['attributes'])) {
                        $data = $normalized['data']['attributes'];
                        if (isset($data['_id'])) {
                            $data['id'] = $data['_id'];
                            unset($data['_id']);
                        }
                    }

                    return $data;
                } catch (Exception $e) {
                    throw new \RuntimeException(
                        sprintf('Failed to transform entity %s to API Platform resource', $entity->getId()),
                        0,
                        $e,
                    );
                }
            }

            public function getType(): string
            {
                return $this->typeName;
            }
        };
    }
}
