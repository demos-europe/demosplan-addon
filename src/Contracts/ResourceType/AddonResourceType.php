<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Config\GlobalConfigInterface;
use DemosEurope\DemosplanAddon\Contracts\CurrentContextProviderInterface;
use DemosEurope\DemosplanAddon\Contracts\MessageBagInterface;
use DemosEurope\DemosplanAddon\Permission\PermissionEvaluatorInterface;
use EDT\ConditionFactory\ConditionFactoryInterface;
use EDT\JsonApi\RequestHandling\MessageFormatter;
use EDT\JsonApi\ResourceTypes\CachingResourceType;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathTrait;
use EDT\Querying\Contracts\PropertyPathInterface;
use EDT\Wrapping\Utilities\TypeAccessor;
use EDT\Wrapping\WrapperFactories\WrapperObjectFactory;
use IteratorAggregate;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use function in_array;
use function is_array;

/**
 * @template T of object
 *
 * @template-extends CachingResourceType<T>
 *
 * @property-read End $id
 */
abstract class AddonResourceType extends CachingResourceType implements IteratorAggregate, PropertyPathInterface
{
    use PropertyAutoPathTrait;

    protected GlobalConfigInterface $globalConfig;

    protected LoggerInterface $logger;

    protected MessageBagInterface $messageBag;

    protected ResourceTypeServiceInterface $resourceTypeService;

    protected TranslatorInterface $translator;

    protected ConditionFactoryInterface $conditionFactory;

    protected TypeAccessor $typeAccessor;

    protected WrapperObjectFactory $wrapperFactory;

    protected PermissionEvaluatorInterface $permissionEvaluator;

    private MessageFormatter $messageFormatter;
    protected CurrentContextProviderInterface $currentContextProvider;

    public function __construct(
        PermissionEvaluatorInterface     $permissionEvaluator,
        CurrentContextProviderInterface  $currentContextProvider,
        GlobalConfigInterface            $globalConfig,
        LoggerInterface                  $logger,
        MessageBagInterface              $messageBag,
        ResourceTypeServiceInterface     $resourceTypeService,
        TranslatorInterface              $translator,
        ConditionFactoryInterface        $conditionFactory
    )
    {
        $this->globalConfig = $globalConfig;
        $this->logger = $logger;
        $this->messageBag = $messageBag;
        $this->resourceTypeService = $resourceTypeService;
        $this->translator = $translator;
        $this->conditionFactory = $conditionFactory;
        $this->messageFormatter = new MessageFormatter();
        $this->permissionEvaluator = $permissionEvaluator;
        $this->currentContextProvider = $currentContextProvider;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function addCreationErrorMessage(array $parameters): void
    {
        $this->messageBag->add('error', 'generic.error');
    }

    public function getDefaultSortMethods(): array
    {
        return [];
    }

    public function getIdentifierPropertyPath(): array
    {
        return $this->id->getAsNames();
    }

    public function getInternalProperties(): array
    {
        return array_map(static function (string $className): ?string {
            $classImplements = class_implements($className);
            if (is_array($classImplements) && in_array(ResourceTypeInterface::class, $classImplements, true)) {
                /* @var ResourceTypeInterface $className */
                return $className::getName();
            }

            return null;
        }, $this->getAutoPathProperties());
    }

    /**
     * Convert the given array to an array with different mapping.
     *
     * The returned array will map using
     *
     * * as key: the dot notation of the property path
     * * as value: the corresponding {@link ResourceTypeInterface::getName} return value in case of a
     * relationship or `null` in case of an attribute
     *
     * The behavior for multiple given property paths with the same dot notation is undefined.
     *
     * @param PropertyPathInterface ...$propertyPaths
     *
     * @return array<string,string|null>
     */
    protected function toProperties(PropertyPathInterface ...$propertyPaths): array
    {
        return collect($propertyPaths)
            ->mapWithKeys(static function (PropertyPathInterface $propertyPath): array {
                $key = $propertyPath->getAsNamesInDotNotation();
                $value = $propertyPath instanceof ResourceTypeInterface
                    ? $propertyPath::getName()
                    : null;

                return [$key => $value];
            })->all();
    }

    protected function processProperties(array $properties): array
    {
        return $properties;
    }

    protected function getWrapperFactory(): WrapperObjectFactory
    {
        return $this->wrapperFactory;
    }

    protected function getTypeAccessor(): TypeAccessor
    {
        return $this->typeAccessor;
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    protected function getMessageFormatter(): MessageFormatter
    {
        return $this->messageFormatter;
    }
}

