<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\ResourceType\JsonApiResourceTypeInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\Pagination\PagePaginationParser;
use EDT\JsonApi\RequestHandling\FilterParserInterface;
use EDT\JsonApi\RequestHandling\JsonApiSortingParser;
use EDT\JsonApi\RequestHandling\PaginatorFactory;
use EDT\JsonApi\RequestHandling\RequestTransformer;
use EDT\JsonApi\Requests\ListRequest;
use EDT\Wrapping\Utilities\SchemaPathProcessor;
use League\Fractal\Resource\Collection;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @template-extends ListRequest<ClauseFunctionInterface<bool>, OrderBySortMethodInterface>
 */
class SearchCapableListRequest extends ListRequest
{
    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        FilterParserInterface $filterParser,
        JsonApiSortingParser $sortingParser,
        PaginatorFactory $paginatorFactory,
        PagePaginationParser $paginationParser,
        RequestTransformer $requestParser,
        SchemaPathProcessor $schemaPathProcessor,
        protected readonly JsonApiEsServiceInterface $jsonApiEsService
    ) {
        parent::__construct(
            $filterParser,
            $sortingParser,
            $paginatorFactory,
            $paginationParser,
            $requestParser,
            $schemaPathProcessor,
            $eventDispatcher
        );
    }

    /**
     * @param JsonApiResourceTypeInterface<EntityInterface> $type
     */
    public function searchResources(JsonApiResourceTypeInterface $type): Collection
    {
        $urlParams = $this->requestParser->getUrlParameters();

        $searchParams = $urlParams->get(JsonApiEsServiceInterface::SEARCH, []);
        if ([] === $searchParams
            || (
                array_key_exists(JsonApiEsServiceInterface::VALUE, $searchParams)
                && '' === $searchParams[JsonApiEsServiceInterface::VALUE]
            )
        ) {
            return $this->listResources($type);
        }

        $conditions = $this->getConditions($urlParams);
        $sortMethods = $this->getSortMethods($urlParams);
        $pagination = $this->paginationParser->getPagination($urlParams);

        // we do not need to apply any sorting here, because it needs to be applied later
        $entityIdentifiers = $type->listEntityIdentifiers($conditions, []);

        $apiList = $this->jsonApiEsService->optimisticallyGetEsFilteredObjects(
            $type,
            $entityIdentifiers,
            $searchParams[JsonApiEsServiceInterface::VALUE],
            $searchParams[JsonApiEsServiceInterface::FIELDS_TO_SEARCH] ?? null,
            $sortMethods,
            $pagination
        );

        $entities = $apiList->getList();
        $meta = $apiList->getMeta();
        $paginator = $apiList->getPaginator();

        $collection = new Collection($entities, $type->getTransformer(), $type->getTypeName());
        $collection->setMeta($meta);
        if (null !== $paginator) {
            $collection->setPaginator($this->paginatorFactory->createPaginatorAdapter($paginator));
        }

        return $collection;
    }
}
