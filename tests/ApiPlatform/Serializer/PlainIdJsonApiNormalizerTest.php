<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Tests\ApiPlatform\Serializer;

use ApiPlatform\Metadata\IriConverterInterface;
use ApiPlatform\Metadata\Resource\Factory\ResourceMetadataCollectionFactoryInterface;
use ApiPlatform\Metadata\Resource\Factory\ResourceNameCollectionFactoryInterface;
use DemosEurope\DemosplanAddon\ApiPlatform\Serializer\PlainIdJsonApiNormalizer;
use DemosEurope\DemosplanAddon\Tests\Fake\FakeDecoratedNormalizer;
use DemosEurope\DemosplanAddon\Tests\Fake\FakeResourceNameCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DemosEurope\DemosplanAddon\ApiPlatform\Serializer\PlainIdJsonApiNormalizer
 */
class PlainIdJsonApiNormalizerTest extends TestCase
{
    public function testNormalizeStripsAllIrisFromResponseData(): void
    {
        $sut = new PlainIdJsonApiNormalizer(
            new FakeDecoratedNormalizer(),
            $this->createStub(IriConverterInterface::class),
            $this->createStub(ResourceNameCollectionFactoryInterface::class),
            $this->createStub(ResourceMetadataCollectionFactoryInterface::class),
        );

        $result = $sut->normalize([
            'data' => [
                'type'          => 'Procedure',
                'id'            => '/api/3.0/Procedure/proc-uuid',
                'relationships' => [
                    'owner'      => [
                        'data' => ['type' => 'User', 'id' => '/api/3.0/User/user-uuid'],
                    ],
                    'statements' => [
                        'data' => [
                            ['type' => 'Statement', 'id' => '/api/3.0/Statement/uuid-1'],
                            ['type' => 'Statement', 'id' => '/api/3.0/Statement/uuid-2'],
                        ],
                    ],
                ],
            ],
        ]);

        self::assertSame('proc-uuid', $result['data']['id']);
        self::assertSame('user-uuid', $result['data']['relationships']['owner']['data']['id']);
        self::assertSame('uuid-1',    $result['data']['relationships']['statements']['data'][0]['id']);
        self::assertSame('uuid-2',    $result['data']['relationships']['statements']['data'][1]['id']);
    }

    public function testDenormalizeLeavesIdUnchangedForUnknownResourceType(): void
    {
        // Empty registry: findResourceClass() returns null → iriConverter is never reached
        $sut = new PlainIdJsonApiNormalizer(
            new FakeDecoratedNormalizer(),
            $this->createStub(IriConverterInterface::class),
            new FakeResourceNameCollectionFactory([]),
            $this->createStub(ResourceMetadataCollectionFactoryInterface::class),
        );

        $result = $sut->denormalize([
            'data' => [
                'type'          => 'Procedure',
                'id'            => 'proc-uuid',
                'relationships' => [
                    'something' => [
                        'data' => ['type' => 'UnknownType', 'id' => 'some-uuid'],
                    ],
                ],
            ],
        ], 'Procedure');

        self::assertSame('some-uuid', $result['data']['relationships']['something']['data']['id']);
    }
}
