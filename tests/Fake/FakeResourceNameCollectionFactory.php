<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Tests\Fake;

use ApiPlatform\Metadata\Resource\Factory\ResourceNameCollectionFactoryInterface;
use ApiPlatform\Metadata\Resource\ResourceNameCollection;

/**
 * Used wherever the SUT iterates over the resource registry with foreach.
 * PHPUnit stubs return null, and foreach on null throws an error, so a real class returning an empty-but-valid collection is needed.
 */
final class FakeResourceNameCollectionFactory implements ResourceNameCollectionFactoryInterface
{
    /** @param string[] $classes */
    public function __construct(private readonly array $classes = []) {}

    public function create(): ResourceNameCollection
    {
        return new ResourceNameCollection($this->classes);
    }
}
