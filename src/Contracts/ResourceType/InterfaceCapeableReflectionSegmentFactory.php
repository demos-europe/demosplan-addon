<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\SegmentFactories\ReflectionSegmentFactory;
use EDT\Querying\Contracts\PropertyPathInterface;
use Exception;
use ReflectionClass;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Webmozart\Assert\Assert;

class InterfaceCapeableReflectionSegmentFactory extends ReflectionSegmentFactory
{
    public function __construct(
        protected ContainerInterface $container
    ) {}

    public function createNextSegment(
        string $className,
        ?PropertyAutoPathInterface $parent,
        ?string $parentPropertyName,
        array $constructorArgs = []
    ): PropertyPathInterface {
        $className = $this->findImplementationOfInterface($className);
        $class = new ReflectionClass($className);
        $childPathSegment = self::createInstance($class, $constructorArgs);

        while (!$class->hasProperty('childCreateCallback') && $class->getParentClass() !== false) {
            $class = $class->getParentClass();
        }

        if ($class->hasProperty('childCreateCallback')) {
            $childCreateCallbackProperty = $class->getProperty('childCreateCallback');
            $childCreateCallbackProperty->setAccessible(true);
            $childCreateCallbackProperty->setValue($childPathSegment, [$this, 'createChildFromPotentialInterface']);
        }

        self::setProperties($childPathSegment, $parent, $parentPropertyName);

        return $childPathSegment;
    }

    protected function findImplementationOfInterface(string $interface): string
    {
        if (class_exists($interface))
        {
            return $interface;
        }

        $interfaceFromContainer = $this->container->get($interface);
        Assert::notNull($interfaceFromContainer);
        $implementingClasses = [get_class($interfaceFromContainer)];

        switch (count($implementingClasses)) {
            case 0:
                throw new Exception('there are no class that implements'. $interface);
            case 1:
                return array_pop($implementingClasses);
            default:
                throw new Exception('there are many as one class that implement'. $interface);
        }
    }
}
