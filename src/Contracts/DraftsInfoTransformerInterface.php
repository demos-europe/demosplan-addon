<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

/**
 * Interface setting the methods to handle transformation from the input data
 * to DraftsList.
 *
 * Interface DraftsInfoTransformerInterface
 */
interface DraftsInfoTransformerInterface
{
    public const STATEMENT = 'statement';
    public const PROPOSALS = 'proposals';

    /**
     * Transform $data to DraftsList.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    public function transform($data);

    /**
     * Returns true if the format is transformable by each specific
     * implementation.
     */
    public function supports(string $format): bool;
}

