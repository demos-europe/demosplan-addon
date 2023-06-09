<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTime;

interface GdprConsentInterface extends UuidEntityInterface, CoreEntityInterface
{
    public function setId(string $id);

    /**
     * @return DateTime|null
     */
    public function getConsentReceivedDate();

    /**
     * @param DateTime|null $consentReceivedDate
     */
    public function setConsentReceivedDate($consentReceivedDate);

    /**
     * @return DateTime|null
     */
    public function getConsentRevokedDate();

    /**
     * @param DateTime|null $date
     */
    public function setConsentRevokedDate($date);

    /**
     * @return UserInterface|null
     */
    public function getConsentee();

    /**
     * @param UserInterface|null $consentee
     */
    public function setConsentee($consentee);

    /**
     * @return StatementInterface
     */
    public function getStatement();

    public function setStatement(StatementInterface $statement);

    public function isConsented(): bool;

    public function isConsentReceived(): bool;

    public function setConsentReceived(bool $consentReceived);

    public function isConsentRevoked(): bool;

    public function setConsentRevoked(bool $consentRevoked);

    /**
     * @return bool true if the consent was given regarding the author data of the statement
     */
    public function isConsentedToAuthorData(): bool;

    /**
     * @return bool true if the consent was given regarding the submitter data of the statement
     */
    public function isConsentedToSubmitterData(): bool;

}