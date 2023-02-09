<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\PathBuilding\DocblockPropertyByTraitEvaluator;
use EDT\PathBuilding\TraitEvaluator;
use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyRead;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyWrite;
use phpDocumentor\Reflection\DocBlock\Tags\TagWithType;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use function Safe\array_combine;

/**
 * @deprecated This class is only needed temporary to fix a bug in a third-party dependency. After the
 * `demos-europe/edt-...` dependencies has been updated to `^0.17`, this class can be removed.
 */
class AddonDocblockPropertyByTraitEvaluator extends DocblockPropertyByTraitEvaluator
{
    private TraitEvaluator $traitEvaluator;
    private array $parsedClasses = [];
    private array $targetTags;

    public function __construct(
        TraitEvaluator $traitEvaluator,
        string $targetTrait,
        array $targetTags
    ) {
        parent::__construct($traitEvaluator, $targetTrait, $targetTags);
        $this->traitEvaluator = $traitEvaluator;
        $this->targetTags = $targetTags;
    }

    public function parseProperties(string $class, bool $includeParents = false): array
    {
        if ($includeParents) {
            $classes = $this->traitEvaluator->getAllParents($class);
            array_unshift($classes, $class);
        } else {
            $classes = [$class];
        }

        return $this->parsePropertiesOfClasses($classes);
    }

    private function parsePropertiesOfClasses(array $classes): array
    {
        $nestedPropertiesByClass = array_map([$this, 'parsePropertiesOfClass'], $classes);

        return array_merge(...array_reverse($nestedPropertiesByClass));
    }

    private function parsePropertiesOfClass(string $class): array
    {
        if (!array_key_exists($class, $this->parsedClasses)) {
            $parser = new AddonDocblockTagParser($class);
            $nestedProperties = array_map(function (string $targetTag) use ($parser): array {
                $tags = $parser->getTags($targetTag);
                $tags = array_map(static function (Tag $tag): TagWithType {
                    if (!$tag instanceof PropertyRead
                        && !$tag instanceof PropertyWrite
                        && !$tag instanceof Property
                        && !$tag instanceof Param
                        && !$tag instanceof Var_) {
                        throw new \InvalidArgumentException("Can not determine variable name for '{$tag->getName()}' tags.");
                    }

                    return $tag;
                }, $tags);
                $keys = array_map([$parser, 'getVariableNameOfTag'], $tags);
                $tags = array_combine($keys, $tags);
                $tags = array_map([$parser, 'getTagType'], $tags);

                return $tags;
            }, $this->targetTags);

            $this->parsedClasses[$class] = array_merge(...$nestedProperties);
        }

        return $this->parsedClasses[$class];
    }
}
