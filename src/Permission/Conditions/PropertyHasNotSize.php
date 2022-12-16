<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class PropertyHasNotSize extends AbstractCondition
{
    /**
     * @var int<0, max>
     */
    private int $size;

    /**
     * @var non-empty-string
     */
    private string $path;

    /**
     * @param int<0, max>      $size
     * @param non-empty-string $path
     */
    public function __construct(int $size, string $path)
    {
        $this->size = $size;
        $this->path = $path;
    }

    public function toCondition(): array
    {
        return [
            $this->createRandomName() => [
                'condition' => [
                    'value'    => $this->size,
                    'path'     => $this->path,
                    'operator' => 'NOT SIZE',
                ],
            ],
        ];
    }
}
