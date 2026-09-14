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

        if (!is_array($data)) {
            return $data;
        }

        if (isset($data['data']['id'])) {
            $data['data']['id'] = $this->stripIriPrefix($data['data']['id']);
        }

        $relationships = $data['data']['relationships'] ?? [];
        foreach ($relationships as $relKey => $relationship) {
            $linkage = $relationship['data'] ?? null;

            if (null === $linkage || !is_array($linkage)) {
                continue;
            }

            // to-one: { "type": "...", "id": "..." }
            if (isset($linkage['id'])) {
                $relationships[$relKey]['data']['id'] = $this->stripIriPrefix($linkage['id']);
                continue;
            }

            // to-many: [{ "type": "...", "id": "..." }, ...]
            foreach ($linkage as $i => $item) {
                if (isset($item['id'])) {
                    $linkage[$i]['id'] = $this->stripIriPrefix($item['id']);
                }
            }
            $relationships[$relKey]['data'] = $linkage;
        }

        $data['data']['relationships'] = $relationships;

        return $data;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $this->decorated->supportsNormalization($data, $format, $context);
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (is_array($data)) {
            foreach (($data['data']['relationships'] ?? []) as $relKey => $relationship) {
                $linkage = $relationship['data'] ?? null;
                if (!is_array($linkage)) {
                    continue;
                }

                // Normalise to-one (assoc) and to-many (list) into a uniform list for processing
                $isToOne = isset($linkage['type'], $linkage['id']);
                $items   = $isToOne ? [$linkage] : $linkage;

                foreach ($items as $i => $item) {
                    if (isset($item['type'], $item['id']) && !str_starts_with($item['id'], '/')) {
                        $resourceClass = $this->findResourceClass($item['type']);
                        if (null !== $resourceClass) {
                            $items[$i]['id'] = $this->iriConverter->getIriFromResource(
                                $resourceClass,
                                context: ['uri_variables' => ['id' => $item['id']]]
                            );
                        }
                    }
                }

                $data['data']['relationships'][$relKey]['data'] = $isToOne ? $items[0] : $items;
            }
        }

        return $this->decorated->denormalize($data, $type, $format, $context);
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->decorated->supportsDenormalization($data, $type, $format, $context);
    }

    /**
     * Resolve a JSON:API short name (e.g. "Statement") to its PHP resource class
     * (e.g. StatementResource::class) by iterating the API Platform resource registry.
     *
     * @return class-string|null
     */
    private function findResourceClass(string $shortName): ?string
    {
        foreach ($this->resourceNameCollectionFactory->create() as $resourceClass) {
            foreach ($this->resourceMetadataCollectionFactory->create($resourceClass) as $apiResource) {
                if ($apiResource->getShortName() === $shortName) {
                    return $resourceClass;
                }
            }
        }

        return null;
    }

    private function stripIriPrefix(string $iri): string
    {
        $parts = explode('/', $iri);

        return end($parts);
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
