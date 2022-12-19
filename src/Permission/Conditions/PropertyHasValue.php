<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission\Conditions;

class PropertyHasValue extends AbstractCondition
{
    /**
     * @var non-empty-string
     */
    private string $path;

    /**
     * @var mixed|null
     */
    private $value;

    /**
     * @param non-empty-string $path
     * @param mixed|null       $value
     */
    public function __construct(string $path, $value)
    {
        $this->path = $path;
        $this->value = $value;
    }

    public function toCondition(): array
    {
        return [
            $this->createRandomName() => [
                'condition' => [
                    'value' => $this->value,
                    'path' => $this->path,
                    'operator' => '='
                ],
            ],
        ];
    }
}
