<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

use InvalidArgumentException;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlockFactory;
use ReflectionException;
use ReflectionMethod;
use function is_string;

/**
 * TODO: Replace with enum based approach. Be careful to implement docblock parsing performance friendly
 */
abstract class AbstractPermissionMeta implements PermissionMetaInterface
{
    /**
     * @var non-empty-string
     */
    private string $name;

    /**
     * @var non-empty-string
     */
    private string $label;

    private string $description;

    private bool $exposed;

    /**
     * @param non-empty-string $name
     *
     * @throws ReflectionException
     * @throws InvalidArgumentException
     */
    protected function __construct(string $name)
    {
        $this->name = $name;
        $docblock = self::createDocblock(new ReflectionMethod(static::class, $name));
        if (null !== $docblock) {
            $this->label = $docblock->getSummary();
            $this->description = $docblock->getDescription()->render();
        } else {
            throw new InvalidArgumentException('Missing docblock');
        }
        $this->exposed = true; // TODO: parse from attribute
    }

    private static function createDocblock(ReflectionMethod $commented): ?DocBlock
    {
        $docBlock = $commented->getDocComment();

        return is_string($docBlock) && '' !== $docBlock
            ? DocBlockFactory::createInstance()->create($docBlock)
            : null;
    }

    public function getPermissionName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isExposed(): bool
    {
        return $this->exposed;
    }
}
