<?php

declare(strict_types=1);

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Logic\ApiRequest;

use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\ConditionFactories\DqlConditionFactory;
use EDT\Querying\FluentQueries\ConditionDefinition;

/**
 * DQL-specific ConditionDefinition for use with DoctrineOrmEntityProvider.
 *
 * EDT 0.26 separates predefined types (DrupalFilterInterface) from DQL types (ClauseFunctionInterface).
 * This class overrides the parent to accept DQL-specific conditions (ClauseFunctionInterface)
 * instead of predefined types (DrupalFilterInterface).
 */
class DqlConditionDefinition extends ConditionDefinition
{
    public function __construct(
        protected DqlConditionFactory $dqlConditionFactory,
        bool                          $andConjunction
    )
    {
        // Pass the DQL factory to parent - it implements the required interface
        parent::__construct($dqlConditionFactory, $andConjunction);
    }

    /**
     * Override to return DqlConditionDefinition instead of base ConditionDefinition
     */
    public function anyConditionApplies(): DqlConditionDefinition
    {
        $subDefinition = new DqlConditionDefinition($this->dqlConditionFactory, false);
        $this->subDefinitions[] = $subDefinition;
        return $subDefinition;
    }

    /**
     * Override to return DqlConditionDefinition instead of base ConditionDefinition
     */
    public function allConditionsApply(): DqlConditionDefinition
    {
        $subDefinition = new DqlConditionDefinition($this->dqlConditionFactory, true);
        $this->subDefinitions[] = $subDefinition;
        return $subDefinition;
    }

    /**
     * Override parent's add() method to accept DQL conditions (ClauseFunctionInterface)
     * instead of DrupalFilterInterface.
     *
     * This is necessary because DqlConditionFactory returns ClauseFunctionInterface,
     * while the parent ConditionDefinition expects DrupalFilterInterface.
     *
     * @param ClauseFunctionInterface<bool> $condition
     *
     * @return $this
     */
    protected function add($condition): self
    {
        $this->conditions[] = $condition;
        return $this;
    }

    /**
     * Add a custom DQL condition (ClauseFunctionInterface) publicly.
     *
     * This is a convenience method for adding custom DQL conditions directly,
     * which is needed for custom clauses like HasSegmentsClause.
     *
     * @param ClauseFunctionInterface<bool> $condition
     *
     * @return $this
     */
    public function addDqlCondition(ClauseFunctionInterface $condition): self
    {
        return $this->add($condition);
    }

    /**
     * Override to return DQL conditions (ClauseFunctionInterface) instead of DrupalFilterInterface.
     *
     * @return list<ClauseFunctionInterface<bool>>
     */
    public function getConditions(): array
    {
        return $this->processSubDefinitions();
    }

    /**
     * Override to handle DQL-specific condition processing.
     *
     * This is necessary because the parent's processSubDefinitions() calls
     * $this->conditionFactory->allConditionsApply() / anyConditionApplies()
     * which expect DrupalFilterInterface, but we have ClauseFunctionInterface.
     *
     * @return list<ClauseFunctionInterface<bool>>
     */
    protected function processSubDefinitions(): array
    {
        $nestedConditions = array_map(function (DqlConditionDefinition $definition): array {
            $subConditions = $definition->getConditions();

            // Check if subdefinition can be flat-merged
            if ($definition->andConjunction === $this->andConjunction || 1 >= count($subConditions)) {
                return $subConditions;
            }

            // Cannot flat-merge - wrap in DQL condition group
            $conditionGroup = $definition->andConjunction
                ? $this->dqlConditionFactory->allConditionsApply(...$subConditions)
                : $this->dqlConditionFactory->anyConditionApplies(...$subConditions);

            return [$conditionGroup];
        }, $this->subDefinitions);

        return array_merge($this->conditions, ...$nestedConditions);
    }
}
