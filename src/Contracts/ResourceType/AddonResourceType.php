<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Config\GlobalConfigInterface;
use DemosEurope\DemosplanAddon\Contracts\CurrentContextProviderInterface;
use DemosEurope\DemosplanAddon\Contracts\MessageBagInterface;
use DemosEurope\DemosplanAddon\Permission\PermissionEvaluatorInterface;
use EDT\ConditionFactory\ConditionFactoryInterface;
use EDT\JsonApi\RequestHandling\MessageFormatter;
use EDT\JsonApi\ResourceTypes\CachingResourceType;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\PathBuilding\DocblockPropertyByTraitEvaluator;
use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;
use EDT\PathBuilding\TraitEvaluator;
use EDT\Querying\Contracts\PathsBasedInterface;
use EDT\Querying\Contracts\PropertyPathInterface;
use EDT\Wrapping\Contracts\TypeProviderInterface;
use EDT\Wrapping\Contracts\Types\TypeInterface;
use EDT\Wrapping\WrapperFactories\WrapperObjectFactory;
use IteratorAggregate;
use Pagerfanta\Pagerfanta;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use Symfony\Component\DependencyInjection\ContainerInterface;
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
abstract class AddonResourceType extends CachingResourceType implements JsonApiResourceTypeInterface, IteratorAggregate, PropertyPathInterface, PropertyAutoPathInterface
{
    use PropertyAutoPathTrait;

    protected GlobalConfigInterface $globalConfig;

    protected LoggerInterface $logger;

    protected MessageBagInterface $messageBag;

    protected ResourceTypeServiceInterface $resourceTypeService;

    protected TranslatorInterface $translator;

    protected ConditionFactoryInterface $conditionFactory;

    protected TypeProviderInterface $typeProvider;

    protected WrapperObjectFactory $wrapperFactory;

    protected PermissionEvaluatorInterface $permissionEvaluator;

    private MessageFormatter $messageFormatter;

    protected CurrentContextProviderInterface $currentContextProvider;

    public function __construct(
        PermissionEvaluatorInterface    $permissionEvaluator,
        TypeProviderInterface           $typeProvider,
        CurrentContextProviderInterface $currentContextProvider,
        GlobalConfigInterface           $globalConfig,
        LoggerInterface                 $logger,
        MessageBagInterface             $messageBag,
        ResourceTypeServiceInterface    $resourceTypeService,
        TranslatorInterface             $translator,
        ConditionFactoryInterface       $conditionFactory,
        WrapperObjectFactory            $wrapperFactory,
        protected ContainerInterface    $container,
        protected readonly JsonApiResourceTypeServiceInterface $jsonApiResourceTypeService
    ) {
        $this->globalConfig = $globalConfig;
        $this->logger = $logger;
        $this->messageBag = $messageBag;
        $this->resourceTypeService = $resourceTypeService;
        $this->translator = $translator;
        $this->conditionFactory = $conditionFactory;
        $this->messageFormatter = new MessageFormatter();
        $this->permissionEvaluator = $permissionEvaluator;
        $this->currentContextProvider = $currentContextProvider;
        $this->typeProvider = $typeProvider;
        $this->wrapperFactory = $wrapperFactory;
        $this->childCreateCallback = fn(string $propertyType, ResourceTypeInterface $self, string $propertyName): PropertyPathInterface
        => $this->createChildFromPotentialInterface($propertyType, $self, $propertyName);
    }

    public function createChildFromPotentialInterface(
        string $className,
        ?PropertyAutoPathInterface $parent,
        ?string $parentPropertyName,
        array $constructorArgs = []
    ): PropertyPathInterface {
        $className = $this->findImplementationOfInterface($className);
        $class = new ReflectionClass($className);

        if ([] === $constructorArgs) {
            $constructor = $class->getConstructor();
            if (null === $constructor || 0 === $constructor->getNumberOfRequiredParameters()) {
                $childPathSegment = $class->newInstance();
            } else {
                $childPathSegment = $class->newInstanceWithoutConstructor();
            }
        } else {
            $childPathSegment = $class->newInstanceArgs($constructorArgs);
        }

        while (!$class->hasProperty('childCreateCallback') && $class->getParentClass() !== false) {
            $class = $class->getParentClass();
        }

        if ($class->hasProperty('childCreateCallback')) {
            $childCreateCallbackProperty = $class->getProperty('childCreateCallback');
            $childCreateCallbackProperty->setAccessible(true);
            $childCreateCallbackProperty->setValue($childPathSegment, [$this, 'createChildFromPotentialInterface']);
        }

        if (null !== $parent) {
            $childPathSegment->setParent($parent);
        }
        if (null !== $parentPropertyName) {
            $childPathSegment->setParentPropertyName($parentPropertyName);
        }

        return $childPathSegment;
    }

    protected function findImplementationOfInterface(string $interface): string
    {
        if (class_exists($interface))
        {
            return $interface;
        }

        $implementingClasses = [get_class($this->container->get($interface))];

        switch (count($implementingClasses)) {
            case 0:
                throw new \Exception('there are no class that implements'. $interface);
            case 1:
                return array_pop($implementingClasses);
            default:
                throw new \Exception('there are many as one class that implement'. $interface);
        }
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function addCreationErrorMessage(array $parameters): void
    {
        $this->jsonApiResourceTypeService->addCreationErrorMessage($parameters);
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
        $properties = array_map(function (string $className): ?string {
            $classImplements = class_implements($className);
            if (is_array($classImplements) && in_array(ResourceTypeInterface::class, $classImplements, true)) {
                if (interface_exists($className))
                {
                    $className = $this->findImplementationOfInterface($className);
                }
                /* @var ResourceTypeInterface $className */
                return $className::getName();
            }

            return null;
        }, $this->getAutoPathProperties());

        return array_map(
            fn (?string $typeIdentifier): ?TypeInterface => null === $typeIdentifier
                ? null
                : $this->typeProvider->requestType($typeIdentifier)->getInstanceOrThrow(),
            $properties
        );
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

    /**
     * @deprecated This method is only needed temporary to fix a bug in a third-party dependency. After the
     * `demos-europe/edt-...` dependencies has been updated to `^0.17`, this method can be removed.
     */
    protected function getDocblockTraitEvaluator(array $targetTags): DocblockPropertyByTraitEvaluator
    {
        if (null === $this->docblockTraitEvaluator) {
            $this->docblockTraitEvaluator = new AddonDocblockPropertyByTraitEvaluator(
                new TraitEvaluator(),
                PropertyAutoPathTrait::class,
                $targetTags,
            );
        }

        return $this->docblockTraitEvaluator;
    }

    protected function processProperties(array $properties): array
    {
        return $properties;
    }

    protected function getWrapperFactory(): WrapperObjectFactory
    {
        return $this->wrapperFactory;
    }

    protected function getTypeProvider(): TypeProviderInterface
    {
        return $this->typeProvider;
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    protected function getMessageFormatter(): MessageFormatter
    {
        return $this->messageFormatter;
    }

    public function isExposedAsPrimaryResource(): bool
    {
        return $this->jsonApiResourceTypeService->isExposedAsPrimaryResource($this);
    }

    public function isExposedAsRelationship(): bool
    {
        return $this->jsonApiResourceTypeService->isExposedAsRelationship($this);
    }

    public function listEntities(array $conditions, array $sortMethods = []): array
    {
        return $this->jsonApiResourceTypeService->listEntities($this, $conditions, $sortMethods);
    }

    public function getEntityPaginator(ApiPaginationInterface $pagination, array $conditions, array $sortMethods = []): Pagerfanta
    {
        return $this->jsonApiResourceTypeService->getEntityPaginator($this, $pagination, $conditions, $sortMethods);
    }

    public function listPrefilteredEntities(array $dataObjects, array $conditions = [], array $sortMethods = []): array
    {
        return $this->jsonApiResourceTypeService->listPrefilteredEntities($this, $dataObjects, $conditions, $sortMethods);
    }

    public function getEntityAsReadTarget(string $id): object
    {
        return $this->jsonApiResourceTypeService->getEntityAsReadTarget($this, $id);
    }

    public function getEntityCount(array $conditions): int
    {
        return $this->jsonApiResourceTypeService->getEntityCount($this, $conditions);
    }

    public function getEntityByTypeIdentifier(string $id): object
    {
        return $this->jsonApiResourceTypeService->getEntityByTypeIdentifier($this, $id);
    }

    public function listEntityIdentifiers(array $conditions, array $sortMethods): array
    {
        return $this->jsonApiResourceTypeService->listEntityIdentifiers($this, $conditions, $sortMethods);
    }
}
