<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\EntityPath;

use EDT\PathBuilding\End;
use EDT\PathBuilding\PropertyAutoPathInterface;
use EDT\PathBuilding\PropertyAutoPathTrait;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @property-read End $id
 * @property-read StatementFragmentPath $statementFragment
 * @property-read End $displayId
 * @property-read End $text
 * @property-read End $tagAndTopicNames
 * @property-read ProcedurePath $procedure
 * @property-read End $voteAdvice
 * @property-read End $vote
 * @property-read End $created
 * @property-read End $departmentName
 * @property-read End $orgaName
 * @property-read End $considerationAdvice
 * @property-read End $consideration
 * @property-read End $countyNames
 * @property-read End $priorityAreaKeys
 * @property-read End $municipalityNames
 * @property-read End $archivedOrgaName
 * @property-read End $archivedDepartmentName
 * @property-read End $archivedVoteUserName
 * @property-read UserPath $modifiedByUser
 * @property-read DepartmentPath $modifiedByDepartment
 * @property-read End $elementTitle
 * @property-read End $elementCategory
 * @property-read ParagraphVersionPath $paragraph
 * @property-read SingleDocumentVersionPath $document
 */
class StatementFragmentVersionPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
