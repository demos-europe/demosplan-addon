<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\ResourceConfigBuilder;

use DemosEurope\DemosplanAddon\Contracts\Entities\ExportFieldsConfigurationInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\PropertyConfig\Builder\AttributeConfigBuilderInterface;
use EDT\JsonApi\PropertyConfig\Builder\ToOneRelationshipConfigBuilderInterface;
use EDT\JsonApi\ResourceConfig\Builder\MagicResourceConfigBuilder;

/**
 * WARNING: THIS CLASS IS AUTOGENERATED.
 * MANUAL CHANGES WILL BE LOST ON RE-GENERATION.
 *
 * To add additional properties, you may want to
 * create an extending class and add them there.
 *
 * @template-extends MagicResourceConfigBuilder<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ExportFieldsConfigurationInterface>
 *
 * @property-read ToOneRelationshipConfigBuilderInterface<ClauseFunctionInterface<bool>,OrderBySortMethodInterface,ExportFieldsConfigurationInterface,ProcedureInterface> $procedure
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $creationDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $modificationDate
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $idExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $statementNameExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $creationDateExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $procedureNameExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $procedurePhaseExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $votesNumExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $userStateExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $userGroupExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $userOrganisationExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $userPositionExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $institutionExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $publicParticipationExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $orgaNameExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $departmentNameExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $submitterNameExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $showInPublicAreaExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $documentExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $paragraphExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $filesExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $attachmentsExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $priorityExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $emailExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $phoneNumberExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $streetExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $streetNumberExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $postalCodeExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $cityExportable
 * @property-read AttributeConfigBuilderInterface<ClauseFunctionInterface<bool>,ExportFieldsConfigurationInterface> $institutionOrCitizenExportable
 */
class BaseExportFieldsConfigurationResourceConfigBuilder extends MagicResourceConfigBuilder
{
}
