<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class PropertyIsCurrentProcedureId extends AbstractCondition
{
    /**
     * @var non-empty-string
     */
    private string $path;

    /**
     * @param non-empty-string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function toCondition(): array
    {
        return [
            $this->createRandomName() => [
                'parameterCondition' => [
                    'path' => $this->path,
                    'parameter' => '$currentProcedureId',
                    'operator' => '=',
                ],
            ],
        ];
    }
}
