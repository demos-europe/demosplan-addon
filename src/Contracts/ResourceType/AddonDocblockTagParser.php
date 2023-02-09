<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use EDT\Parsing\Utilities\DocblockTagParser;
use EDT\Parsing\Utilities\TagTypeParseException;
use EDT\Parsing\Utilities\UseCollector;
use phpDocumentor\Reflection\DocBlock\Tags\TagWithType;
use phpDocumentor\Reflection\Types\AggregatedType;
use phpDocumentor\Reflection\Types\Object_;
use PhpParser\NodeTraverser;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use ReflectionClass;
use function Safe\fclose;
use function Safe\fopen;

/**
 * @deprecated This class is only needed temporary to fix a bug in a third-party dependency. After the
 * `demos-europe/edt-...` dependencies has been updated to `^0.17`, this class can be removed.
 */
class AddonDocblockTagParser extends DocblockTagParser
{
    private ReflectionClass $reflectionClass;
    private array $useStatements;
    private Parser $phpParser;

    public function __construct(string $class)
    {
        parent::__construct($class);
        $this->phpParser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $this->reflectionClass = new ReflectionClass($class);
        $this->useStatements = $this->getUseStatements();

    }

    public function getTagType(TagWithType $tag): string
    {
        $namespaceName = $this->reflectionClass->getNamespaceName();

        return $this->getFqsenOfClass($tag, $namespaceName);
    }

    private function getFqsenOfClass(TagWithType $tag, string $namespaceName): string
    {
        $tagType = $tag->getType();
        if ($tagType instanceof AggregatedType) {
            throw TagTypeParseException::createForAggregatedType($tag, $tagType, $this->reflectionClass->getName());
        }
        if (!$tagType instanceof Object_) {
            // not even an object as return type
            throw TagTypeParseException::createForTagType($tag, (string)$tagType, $this->reflectionClass->getName());
        }

        $typeDeclaration = (string)$tagType->getFqsen();
        $fqsenParts = explode('\\', $typeDeclaration);
        if (2 > count($fqsenParts)) {
            throw TagTypeParseException::createForTagType($tag, (string)$tagType, $this->reflectionClass->getName());
        }

        // look for return type in use statements
        $class = $fqsenParts[1];
        $fqsen = null;
        foreach ($this->useStatements as $as => $currentUseFqsen) {
            if ($class === $as) {
                $fqsen = $currentUseFqsen;
                break;
            }
        }

        if (null !== $fqsen && (class_exists($fqsen) || interface_exists($fqsen))) {
            // usable return type found in use statements
            return $fqsen;
        }

        if (class_exists($typeDeclaration) || interface_exists($typeDeclaration)) {
            // the declaration was a valid FQSEN in the first place
            return $typeDeclaration;
        }

        // no matching 'use' statements were found and the class is not already defined
        // with a FQSEN. Adding the current namespace as last resort to find it.
        $fqsen = $namespaceName.$typeDeclaration;
        if (class_exists($fqsen) || interface_exists($fqsen)) {
            // usable return type found in use statements
            return $fqsen;
        }

        // giving up looking for return type
        throw TagTypeParseException::createForTagType($tag, (string)$tagType, $this->reflectionClass->getName());
    }

    private function getUseStatements(): array
    {
        $fileName = $this->reflectionClass->getFileName();
        if (!is_string($fileName)) {
            /**
             * In some cases no source code can be retrieved for the given type (e.g.
             * {@link IteratorAggregate}). For now we will assume it does not happen for with
             * "normal" types and ignore it until it becomes a problem in an actual use case.
             */
            return [];
        }
        $sourceCode = $this->readSourceCode($fileName);
        $ast = $this->phpParser->parse($sourceCode);
        $traverser = new NodeTraverser();
        $useCollector = new UseCollector();
        $traverser->addVisitor($useCollector);
        $traverser->traverse($ast);

        return $useCollector->getUseStatements();
    }

    private function readSourceCode(string $fileName): string
    {
        $file = fopen($fileName, 'r');
        $lineNumber = 0;
        $sourceCode = '';

        while (!feof($file)) {
            $lineNumber += 1;

            if ($lineNumber >= $this->reflectionClass->getStartLine()) {
                break;
            }

            $line = fgets($file);
            if (false === $line) {
                throw new \InvalidArgumentException("Failed to read source code of file: '$fileName' in line $lineNumber.");
            }
            $sourceCode .= $line;
        }

        fclose($file);

        return $sourceCode;
    }
}
