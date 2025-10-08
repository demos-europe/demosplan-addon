<?php

declare(strict_types=1);


namespace DemosEurope\DemosplanAddon\Logic\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use Doctrine\ORM\QueryBuilder;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\MappingException;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\DqlQuerying\ObjectProviders\DoctrineOrmEntityProvider;
use EDT\Querying\Contracts\PaginationException;
use EDT\Querying\FluentQueries\ConditionDefinition;
use EDT\Querying\FluentQueries\FluentQuery;
use EDT\Querying\FluentQueries\SliceDefinition;
use EDT\Querying\FluentQueries\SortDefinition;
use InvalidArgumentException;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends FluentQuery<TEntity>
 */
class DqlFluentQuery extends FluentQuery
{
    /**
     * @param DoctrineOrmEntityProvider<TEntity> $doctrineEntityProvider
     */
    public function __construct(
        protected readonly DoctrineOrmEntityProvider $doctrineEntityProvider,
        ConditionDefinition $conditionDefinition,
        SortDefinition $sortDefinition,
        SliceDefinition $sliceDefinition
    ) {
        parent::__construct(
            $this->doctrineEntityProvider,
            $conditionDefinition,
            $sortDefinition,
            $sliceDefinition
        );
    }

    /**
     * Get the count of rows found by the configuration of this query.
     *
     * Use the `$idAttributeName` parameter if your entity does not have an `id` attribute to
     * store the entity identifier but something like `ident` instead.
     *
     * @throws MappingException
     * @throws PaginationException
     */
    public function getCount(string $idAttributeName = 'id'): int
    {
        $queryBuilder = $this->generateEntitiesQueryBuilder();
        $this->replaceSelectWithCount($queryBuilder, $idAttributeName);

        return (int) $queryBuilder->getQuery()->getSingleScalarResult();
    }

    public function generateCountQueryBuilder(): QueryBuilder
    {
        $queryBuilder = $this->generateEntitiesQueryBuilder();
        $this->replaceSelectWithCount($queryBuilder);

        return $queryBuilder;
    }

    public function generateEntitiesQueryBuilder(): QueryBuilder
    {
        return $this->doctrineEntityProvider->generateQueryBuilder(
            $this->getConditionDefinition()->getConditions(),
            $this->getSortDefinition()->getSortMethods(),
            $this->getSliceDefinition()->getOffset(),
            $this->getSliceDefinition()->getLimit()
        );
    }

    protected function replaceSelectWithCount(QueryBuilder $queryBuilder, string $idAttributeName = 'id'): void
    {
        // extract the original `select`, because it contains the table alias
        $selects = $queryBuilder->getDQLPart('select');
        $selectsCount = is_countable($selects) ? count($selects) : 0;
        if (1 !== $selectsCount) {
            // we only expect a single `select`, otherwise something is wrong
            throw new InvalidArgumentException("Unexpected number of selects in query. Expected exactly one, got $selectsCount");
        }
        $tableAlias = array_pop($selects);

        // delete the previous `select`
        $queryBuilder->resetDQLPart('select');

        // set the count in the select
        $queryBuilder->select("count($tableAlias.$idAttributeName)");
    }
}
