<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\CountyInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\DraftStatementInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ElementsInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\GdprConsentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\MunicipalityInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OrgaInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\OriginalStatementAnonymizationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ParagraphVersionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\PriorityAreaInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedurePersonInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SingleDocumentVersionInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementAttachmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementAttributeInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementFragmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementLikeInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementMetaInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementVersionFieldInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementVoteInterface;
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
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface>
 *
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $parent
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $children
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $original
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $statementsCreatedFromOriginal
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $priority
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $externId
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $internId
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,UserInterface> $user
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,OrgaInterface> $organisation
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,ProcedureInterface> $procedure
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $represents
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $representationCheck
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $phase
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $status
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $created
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $modified
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $send
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $sentAssessmentDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $submit
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $deletedDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $deleted
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $negativeStatement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $sentAssessment
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $publicUseName
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $publicVerified
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,OriginalStatementAnonymizationInterface> $anonymizations
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $publicStatement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $toSendPerMail
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $title
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $text
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $recommendation
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $memo
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $feedback
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $reasonParagraph
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $planningDocument
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $file
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $mapFile
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $countyNotified
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,ParagraphVersionInterface> $paragraph
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,SingleDocumentVersionInterface> $document
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,ElementsInterface> $element
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $polygon
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,DraftStatementInterface> $draftStatement
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementMetaInterface> $meta
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementVersionFieldInterface> $version
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementAttributeInterface> $statementAttributes
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementVoteInterface> $votes
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $numberOfAnonymVotes
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementLikeInterface> $likes
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,TagInterface> $tags
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,CountyInterface> $counties
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,PriorityAreaInterface> $priorityAreas
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,MunicipalityInterface> $municipalities
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementFragmentInterface> $fragments
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $voteStk
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $votePla
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,GdprConsentInterface> $gdprConsent
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $submitType
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,UserInterface> $assignee
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $headStatement
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $cluster
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $manual
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $clusterStatement
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $placeholderStatement
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementInterface> $movedStatement
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $name
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $replied
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $draftsListJson
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,SegmentInterface> $segmentsOfStatement
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,StatementAttachmentInterface> $attachments
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $segmentationPiRetries
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $piSegmentsProposalResourceUrl
 * @property-read ToManyRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,StatementInterface,ProcedurePersonInterface> $similarStatementSubmitters
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,StatementInterface> $anonymous
 */
class BaseStatementResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
