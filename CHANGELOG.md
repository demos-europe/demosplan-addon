# Changelog

## UNRELEASED
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
