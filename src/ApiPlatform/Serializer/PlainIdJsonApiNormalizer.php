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
 * Register as a service decorator for 'api_platform.jsonapi.normalizer.item'.
 */
final class PlainIdJsonApiNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    public function __construct(
        private readonly NormalizerInterface&DenormalizerInterface $decorated,
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
        return $this->decorated->denormalize($data, $type, $format, $context);
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
