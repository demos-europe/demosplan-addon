<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\CountyInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\DepartmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ElementsInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\MunicipalityInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ParagraphVersionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\PriorityAreaInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SingleDocumentVersionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementFragmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementFragmentVersionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\TagInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToManyRelationshipConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToOneRelationshipConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface>
 *
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,StatementInterface> $statement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $displayId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $text
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,TagInterface> $tags
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,ProcedureInterface> $procedure
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $voteAdvice
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $vote
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $created
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $modified
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $assignedToFbDate
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,DepartmentInterface> $department
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $considerationAdvice
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $consideration
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,CountyInterface> $counties
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,PriorityAreaInterface> $priorityAreas
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,MunicipalityInterface> $municipalities
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,DepartmentInterface> $archivedDepartment
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $archivedOrgaName
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $archivedDepartmentName
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $archivedVoteUserName
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,UserInterface> $assignee
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,StatementFragmentVersionInterface> $versions
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $sortIndex
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,UserInterface> $modifiedByUser
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,DepartmentInterface> $modifiedByDepartment
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementFragmentInterface> $status
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,UserInterface> $lastClaimed
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,ElementsInterface> $element
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,ParagraphVersionInterface> $paragraph
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementFragmentInterface,SingleDocumentVersionInterface> $document
 */
class BaseStatementFragmentResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
