# Changelog

## UNRELEASED
- Add new UpdateTagenEventInterface

## v0.54 (2025-05-05)
- update to symfony 6

## v0.53 (2025-04-23)
 - fix wrong return type on find a place of a procedure

## v0.52 (2025-04-16)
- update return type of getRecords in ExcelImporterHandleImportedTagsRecordsEventInterface

## v0.51 (2025-04-04)
- add OrgaServiceInterface

## v0.50 (2025-03-31)
- add ManualOriginalStatementCreatedEventInterface

## v0.49 (2025-01-22)
 - Add method detachAllTopics to ProcedureInterface
 - Add DeleteTagEventInterface
 - Add ExcelImporterHandleImportedTagsRecordsEventInterface
 - Add ExcelImporterHandleSegmentsEventInterface
 - Add ExcelImporterPrePersistTagsEventInterface
 - Add GetTopicalTagRelationEventInterface
 - Add method getUsedBluePrintId to ProcedureCreatedEventInterface
 - Add TagResourceTypeInterface

## v0.48 (2025-02-13)
- add base statement validation group name to statementInterface
- Add method getBoilerplatesOfCategory to ProcedureServiceInterface

## v0.47 (2024-12-19)
- fix error in interface

## v0.46 (2024-12-19)
- add CoordinatesViewportInterface and MapProjectionConverterInterface for map related tasks

## v0.45 (2024-12-02)
- add interface for new method needed to set accessPermissions via addon

## v0.44 (2024-11-28)
- add InstitutionTagCategoryInterface and related Path
- Adjust OrgaInterface and InstitutionTagInterface (owning orga for institution tags no longer exist)
- Add method getBoilerplatesOfCategory to ProcedureServiceInterface

## v0.43 (2024-11-04)
- add OrgaResourceTypeInterface

## v0.42 (2024-10-25)
- update ProcedureSettingsInterface to be up to date with new core implementations

## v0.41 (2024-09-27)
- upgrade EDT dependencies from 0.24.42 to 0.25
- add missing methods in DoctrineResourceType
- pass correct request to parent class retrieved via request stack

## v0.40 (2024-09-20)
- Add default Map setting values to the CustomerInterface
- Move Customer constants into the CustomerInterface

## v0.39 (2024-08-06)
- Add ParagraphHandlerInterface
- Add method administrationDocumentDeleteHandler to SingleDocumentHandlerInterface

## v0.38 (2024-07-18)
- Add getter and setter to placeinterface
- add solved as a parameter in resourcetype

## v0.37 (2024-07-02)
- Add type declaration to StatementInterface::getUserName()

## v0.36 (2024-06-12)
- update deprecated Tightenco\Collect to Illuminate\Support\Collection

## v0.35 (2024-05-21)
- add methods to SingleDocumentHandlerInterface
- add interface for new event StatementPreDeleteEventInterface

## v0.34 (2024-05-16)
- add StatementCreatedViaExcelEventInterface 

## v0.33 (2024-05-13)
- add EDT dependencies (demos-europe/edt-extra)

## v0.32 (2024-04-22)
- menu highlighting not done via permissions any more

## v0.31 (2024-04-19)
- add method to FileServiceInterface

## v0.30 (2024-04-08)
- add ProcedurePhaseRepositoryInterface

## v0.29 (2024-04-05)
- add interfaces to publish procedure phase entity
- allow iteration value on a procedure phase and statement

## v0.28 (2024-02-27)
- fix user interface again as the previous fix was incomplete

## v0.27 (2024-02-27)
- fix user interface method declaration due to changes within core

## v0.26 (2024-02-16)
- fix user interface

## v0.25 (2024-02-06)
- create UuidV4Generator so that each addon is independent from Core UuidV4Generator

## v0.24 (2024-02-02)
- technical release to heal release problem in previous version
- remove unnecessary definitions from services yaml

## v0.22 (2024-01-29)
- adjust ProcedureInterface due to method-declaration-changes.


## v0.21 (2024-01-23)
- remove deprecated sensio/framework-extra-bundle
- explicitly define required symfony packages
- downgrade bundles to symfony 5.4
- update other dependencies

## v0.20 (2024-01-23)
- technical release to heal release problem in previous version

## v0.19 (2024-01-23)
- technical release as v0.18 did not change composer.json version
- this release was accidentally released as v1.19 and was withdrawn

## v0.18 (2024-01-22)
- remove unused methods because plis database is not used anymore

## v0.17 (2024-01-11)

- improve api error logging

## v0.16 (2024-01-10)
- technical release as v0.15 failed in release process

## v0.15 (2024-01-10)
- update company name in License
- update edt to version 0.24.36

## v0.14 (2024-01-04)

- add 'GetEmailIdsEventInterface'
- adjust the method 'deleteOrphanEmailAddresses': add paramater 'emailIds'

## v0.13 (2023-12-08)

- add submitType const to StatementInterface as well as an const array containing all supported submitTypes
- needed to validate the submitType choices

## v0.12 (2023-11-27)

- rename and add constants in ElementsInterface.php(breaking change)
- replace multiple constants by constant array

## v0.11 (2023-11-06)

- add ParagraphServiceInterface

## v0.10 (2023-10-25)

- add FileInfoInterface

## v0.9 (2023-09-14)

- remove GlobalConfigInterface::subdomainsAllowed

## v0.8 (2023-08-23)

- add interface needed for SegmentOracle
- this also affects DemosPipes so it depends on this version

## v0.7 (2023-08-04)

**feat** Allow addons to utilize FluentRepository  


## v0.6 (2023-07-19)

- **feat** Adjusted the PostProcedureUpdatedEventInterface.
- PostProcedureUpdateEvent::getProcedure() was removed.
- PostProcedureUpdatedEvent::getProcedureBeforeUpdate() was added.
- PostProcedureUpdatedEvent::getProcedureAfterUpdate() was added.
- PostProcedureUpdatedEvent::getModifiedValues() was added.

## v0.5 (2023-07-13)

- add interface needed for xBeteiligungAsyncAddon

## v0.4 (2023-07-06)

- Adjust UserInterface

## v0.3 (2023-06-30)

- **feat** Adjusts interfaces needed for XBeteiligung addon.
- Adjusts Events that are needed in XBeteiligung and Maillane.
- XBeteiligung and Maillane depend on this change.

## v0.2 (2023-06-29)

- **feat** Adjusts global config interface.
- the method generateDownloadFilename was removed from the GlobalConfig (from core:main) that is why the GlobalConfigInterface had to be adjusted.
- This does not affect an addon.

## v0.1.1 (2023-06-16)

- **chore** Delete method that should not be used in Customer

## v0.1 (2023-06-16)

- **feat** Added and adjusted interfaces 
- **chore** Add missing changelog entries

## v0.0.4 (2023-06-15)

- **feat** Enforce php 8.1
- **chore** Enhance interfaces

## v0.0.3 (2023-04-09)

- **fix** Use correct namespaces
- **chore** Add dependencies to composer.json 
- **chore** Add a bunch of new interfaces

## v0.0.2 (2022-11-25)

- **fix** Add a license file instead of just stating the license in `composer.json`

## v0.0.1 (2022-11-25)

Initial release.
