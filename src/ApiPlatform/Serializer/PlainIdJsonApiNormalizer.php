<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\ApiPlatform\Serializer;

use ApiPlatform\Metadata\IriConverterInterface;
use ApiPlatform\Metadata\Resource\Factory\ResourceMetadataCollectionFactoryInterface;
use ApiPlatform\Metadata\Resource\Factory\ResourceNameCollectionFactoryInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Decorates API Platform's JSON:API normalizer to return plain UUIDs instead of IRIs.
 *
 * API Platform uses IRIs (e.g., "/api/3.0/AdminProcedure/550e8400-e29b-41d4-a716-446655440000")
 * as the `id` field in JSON:API responses. EDT and the existing frontend expect plain UUIDs.
 * This normalizer strips the IRI prefix to maintain compatibility.
 *
 * On normalization (GET): strips the IRI path prefix, leaving only the UUID.
 * On denormalization (POST/PATCH): restores plain UUIDs in relationship linkage objects
 * back to full IRIs so that the inner ItemNormalizer can resolve them via IriConverter.
 *
 * Register as a service decorator for 'api_platform.jsonapi.normalizer.item'.
 */
final class PlainIdJsonApiNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    /** @var array<string, class-string|null> */
    private array $resourceClassCache = [];

    public function __construct(
        private readonly NormalizerInterface&DenormalizerInterface $decorated,
        private readonly IriConverterInterface $iriConverter,
        private readonly ResourceNameCollectionFactoryInterface $resourceNameCollectionFactory,
        private readonly ResourceMetadataCollectionFactoryInterface $resourceMetadataCollectionFactory,
    ) {
    }

    public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = $this->decorated->normalize($object, $format, $context);

        if (is_array($data) && isset($data['data']['id'])) {
            $iri = $data['data']['id'];
            $parts = explode('/', $iri);
            $data['data']['id'] = end($parts);
        }

        return $data;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $this->decorated->supportsNormalization($data, $format, $context);
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (is_array($data)) {
            $data = $this->expandRelationshipIds($data);
        }

        return $this->decorated->denormalize($data, $type, $format, $context);
    }

    /**
     * Walk all relationship linkage objects in the JSON:API body and expand any plain
     * UUIDs to full IRIs so the inner ItemNormalizer can resolve them via IriConverter.
     *
     * @param array<mixed> $data
     * @return array<mixed>
     */
    private function expandRelationshipIds(array $data): array
    {
        $relationships = $data['data']['relationships'] ?? [];

        foreach ($relationships as &$relationship) {
            $linkage = $relationship['data'] ?? null;

            if (null === $linkage || !is_array($linkage)) {
                continue;
            }

            // to-one: { "type": "Statement", "id": "uuid" }
            if (isset($linkage['type'], $linkage['id'])) {
                $relationship['data'] = $this->expandLinkage($linkage);
                continue;
            }

            // to-many: [{ "type": "Statement", "id": "uuid" }, ...]
            foreach ($linkage as &$item) {
                if (isset($item['type'], $item['id'])) {
                    $item = $this->expandLinkage($item);
                }
            }
            unset($item);
            $relationship['data'] = $linkage;
        }
        unset($relationship);

        $data['data']['relationships'] = $relationships;

        return $data;
    }

    /**
     * @param array{type: string, id: string} $item
     * @return array{type: string, id: string}
     */
    private function expandLinkage(array $item): array
    {
        // Already a routable IRI — leave it alone
        if (str_starts_with($item['id'], '/')) {
            return $item;
        }

        $resourceClass = $this->findResourceClass($item['type']);

        if (null !== $resourceClass) {
            $item['id'] = $this->iriConverter->getIriFromResource(
                $resourceClass,
                context: ['uri_variables' => ['id' => $item['id']]]
            );
        }

        return $item;
    }

    /**
     * Resolve a JSON:API short name (e.g. "Statement") to its PHP resource class
     * (e.g. StatementResource::class) by iterating the API Platform resource registry.
     * Results are cached for the lifetime of the request.
     *
     * @return class-string|null
     */
    private function findResourceClass(string $shortName): ?string
    {
        if (array_key_exists($shortName, $this->resourceClassCache)) {
            return $this->resourceClassCache[$shortName];
        }

        foreach ($this->resourceNameCollectionFactory->create() as $resourceClass) {
            foreach ($this->resourceMetadataCollectionFactory->create($resourceClass) as $apiResource) {
                if ($apiResource->getShortName() === $shortName) {
                    $this->resourceClassCache[$shortName] = $resourceClass;

                    return $resourceClass;
                }
            }
        }

        $this->resourceClassCache[$shortName] = null;

        return null;
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->decorated->supportsDenormalization($data, $type, $format, $context);
    }

    public function setSerializer(SerializerInterface $serializer): void
    {
        if ($this->decorated instanceof SerializerAwareInterface) {
            $this->decorated->setSerializer($serializer);
        }
    }

    public function getSupportedTypes(?string $format): array
    {
        return $this->decorated->getSupportedTypes($format);
    }
}
