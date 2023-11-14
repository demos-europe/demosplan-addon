<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\MappingException;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\ResourceTypes\ResourceTypeInterface;
use EDT\Querying\Contracts\FunctionInterface;
use EDT\Querying\Contracts\PaginationException;
use EDT\Querying\Contracts\PathException;
use EDT\Querying\Contracts\SortMethodInterface;
use EDT\Wrapping\Contracts\AccessException;
use EDT\Wrapping\Contracts\Types\ExposableRelationshipTypeInterface;
use EDT\Wrapping\Contracts\Types\FilteringTypeInterface;
use EDT\Wrapping\Contracts\Types\SortingTypeInterface;
use EDT\Wrapping\Contracts\Types\TransferableTypeInterface;
use Exception;
use InvalidArgumentException;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Validator\Constraints\GroupSequence;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends ResourceTypeInterface<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, TEntity>
 * @template-extends GetableResourceTypeInterface<TEntity>
 * @template-extends ListableResourceTypeInterface<TEntity>
 * @template-extends CreatableResourceTypeInterface<TEntity>
 * @template-extends UpdatableResourceTypeInterface<TEntity>
 */
interface JsonApiResourceTypeInterface extends ExposableRelationshipTypeInterface, ResourceTypeInterface, GetableResourceTypeInterface, ListableResourceTypeInterface, DeletableResourceTypeInterface, CreatableResourceTypeInterface, UpdatableResourceTypeInterface
{
    /**
     * Adds the Message when an error on creating a Resource Type occurs.
     *
     * @param array<string, mixed> $parameters
     *
     * @throws Exception
     */
    public function addCreationErrorMessage(array $parameters): void;

    public function isAvailable(): bool;

    /**
     * @deprecated use one of the following, depending on your use case:
     * {@link ListableResourceTypeInterface::isListAllowed()},
     * {@link CreatableResourceTypeInterface::isCreateAllowed()},
     * {@link UpdatableResourceTypeInterface::isUpdateAllowed()},
     * {@link GetableResourceTypeInterface::isGetAllowed()},
     * {@link DeletableResourceTypeInterface::isDeleteAllowed()}
     */
    public function isDirectlyAccessible(): bool;

    /**
     * @param list<ClauseFunctionInterface<bool>> $conditions
     * @param list<OrderBySortMethodInterface> $sortMethods
     *
     * @throws PathException
     */
    public function mapPaths(array $conditions, array $sortMethods): void;

    /**
     * @return array<string|GroupSequence> if empty, no validation will be executed, use `Default` to denote the default validation
     */
    public function getUpdateValidationGroups(): array;

    /**
     * @return array<string|GroupSequence> if empty, no validation will be executed, use `Default` to denote the default validation
     */
    public function getCreationValidationGroups(): array;

    /**
     * Unlike {@link FluentRepository::getEntitiesForPage} this method accepts conditions and sort methods using the
     * schema of a resource type instead of the schema of the backing entity.
     *
     * It will automatically check access rights and apply aliases before creating a
     * {@link QueryBuilder} and using it to create the returned {@link DemosPlanPaginator}.
     *
     * @param array<int, ClauseFunctionInterface<bool>> $conditions
     * @param array<int, OrderBySortMethodInterface>    $sortMethods
     *
     * @throws MappingException
     * @throws PaginationException
     * @throws PathException
     */
    public function getEntityPaginator(
        ApiPaginationInterface $pagination,
        array $conditions,
        array $sortMethods = []
    ): Pagerfanta;

    /**
     * Will return all entities matching the given condition with the specified sorting. The dataObjects array is the data source from which
     * matching entities will be returned.
     *
     * For all properties accessed while filtering/sorting it is checked if:
     *
     * * the given type and the types in the property paths are
     *   {@link self::isAvailable() available at all} and
     *   {@link TransferableTypeInterface readable}
     * * the property is available for
     *   {@link FilteringTypeInterface::getFilteringProperties() filtering}/
     *   {@link SortingTypeInterface::getSortingProperties() sorting}
     *
     * @param array<int,TEntity>                 $dataObjects
     * @param array<int,FunctionInterface<bool>> $conditions  Always conjuncted as AND. Order does not matter
     * @param array<int,SortMethodInterface>     $sortMethods Order matters. Lower positions imply
     *                                                        higher priority. Ie. a second sort method
     *                                                        will be applied to each subset individually
     *                                                        that resulted from the first sort method.
     *                                                        The array keys will be ignored.
     *
     * @return array<int, TEntity>
     *
     * @throws AccessException thrown if the resource type denies the currently logged in user
     *                         the access to the resource type needed to fulfill the request
     */
    public function listPrefilteredEntities(
        array $dataObjects,
        array $conditions = [],
        array $sortMethods = []
    ): array;

    /**
     * @param array<int, ClauseFunctionInterface<bool>> $conditions
     */
    public function getEntityCount(array $conditions): int;

    /**
     * @param array<int,FunctionInterface<bool>> $conditions  Always conjuncted as AND. Order does not matter
     * @param array<int,SortMethodInterface>     $sortMethods Order matters. Lower positions imply
     *                                                        higher priority. I.e. a second sort method
     *                                                        will be applied to each subset individually
     *                                                        that resulted from the first sort method.
     *                                                        The array keys will be ignored.
     *
     * @return array<int, string> the identifiers of the entities, sorted by the given $sortMethods
     *
     * @throws AccessException thrown if the resource type denies the currently logged in user
     *                         the access to the resource type needed to fulfill the request
     */
    public function listEntityIdentifiers(
        array $conditions,
        array $sortMethods
    ): array;
}
