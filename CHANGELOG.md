# Changelog

## UNRELEASED

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
