<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Config\GlobalConfigInterface;
use DemosEurope\DemosplanAddon\Contracts\CurrentContextProviderInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\MessageBagInterface;
use DemosEurope\DemosplanAddon\Permission\PermissionEvaluatorInterface;
use EDT\ConditionFactory\ConditionFactoryInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\RequestHandling\MessageFormatter;
use EDT\JsonApi\ResourceTypes\CachingResourceType;
use EDT\PathBuilding\DocblockPropertyByTraitEvaluator;
use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;
use EDT\PathBuilding\PropertyTag;
use EDT\PathBuilding\TraitEvaluator;
use EDT\Querying\Contracts\PropertyPathInterface;
use EDT\Wrapping\Contracts\TypeProviderInterface;
use IteratorAggregate;
use Pagerfanta\Pagerfanta;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends CachingResourceType<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
 * @template-implements JsonApiResourceTypeInterface<TEntity>
 * @template-implements IteratorAggregate<int, non-empty-string>
 *
 * @property-read End $id
 */
abstract class AddonResourceType extends CachingResourceType implements JsonApiResourceTypeInterface, IteratorAggregate, PropertyPathInterface, PropertyAutoPathInterface
{
    use PropertyAutoPathTrait;

    public function __construct(
        protected readonly PermissionEvaluatorInterface    $permissionEvaluator,
        protected readonly TypeProviderInterface           $typeProvider,
        protected readonly CurrentContextProviderInterface $currentContextProvider,
        protected readonly GlobalConfigInterface           $globalConfig,
        protected readonly LoggerInterface                 $logger,
        protected readonly MessageBagInterface             $messageBag,
        protected readonly ResourceTypeServiceInterface    $resourceTypeService,
        protected readonly TranslatorInterface             $translator,
        protected readonly ConditionFactoryInterface       $conditionFactory,
        protected readonly JsonApiResourceTypeServiceInterface $jsonApiResourceTypeService,
        protected readonly MessageFormatter                $messageFormatter,
        InterfaceCapeableReflectionSegmentFactory          $segmentFactory
    ) {
        parent::__construct();
        $this->segmentFactory = $segmentFactory;
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

    /**
     * @param non-empty-list<PropertyTag> $targetTags
     *
     * @deprecated This method is only needed temporary to fix a bug in a third-party dependency. After the
     * `demos-europe/edt-...` dependencies has been updated to `^0.17`, this method can be removed.
     */
    protected function getDocblockTraitEvaluator(array $targetTags): DocblockPropertyByTraitEvaluator
    {
        if (null === $this->docblockTraitEvaluator) {
            $this->docblockTraitEvaluator = new DocblockPropertyByTraitEvaluator(
                new TraitEvaluator(),
                [PropertyAutoPathTrait::class],
                $targetTags,
            );
        }

        return $this->docblockTraitEvaluator;
    }

    protected function processProperties(array $properties): array
    {
        return $properties;
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    protected function getMessageFormatter(): MessageFormatter
    {
        return $this->messageFormatter;
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

    public function mapPaths(array $conditions, array $sortMethods): void
    {
        parent::mapPaths($conditions, $sortMethods);
    }
}
