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
 * @property-read End $note
 * @property-read StatementPath $originalStatement
 * @property-read MailSendPath $sentEmail
 * @property-read End $creationDate
 * @property-read End $modificationDate
 * @property-read StatementPath $statement
 * @property-read End $token
 * @property-read End $manuallyCreated
 */
class ConsultationTokenPath implements PropertyAutoPathInterface
{
	use PropertyAutoPathTrait;
}
