<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use demosplan\DemosPlanCoreBundle\Exception\MessageBagException;
use demosplan\DemosPlanCoreBundle\Logic\Message;
use Symfony\Component\Validator\ConstraintViolationList;
use Tightenco\Collect\Support\Collection;

interface MessageBagInterface
{
    /**
     * Get stored messages from MessageBag and delete them afterwards.
     *
     * Can optionally limit to a severity
     */
    public function get(): Collection;

    public function getConfirm(): Collection;

    public function getConfirmMessages(): Collection;

    public function getInfo(): Collection;

    public function getWarning(): Collection;

    public function getError(): Collection;

    public function getErrorMessages(): Collection;

    /**
     * Add a message to the list.
     *
     * Messages are required to have a severity and a message text.
     * The message text should usually be a translation key. Additional
     * non-required parameters are the options for the translation string
     * and eventually the translation domain which default to empty options
     * and the system translation table.
     *
     * @param string $message #TranslationKey
     * @param string $domain #TranslationDomain
     *
     * @throws MessageBagException
     */
    public function add(
        string $severity,
        string $message,
        array  $params = [],
        string $domain = 'messages'
    );

    /**
     * Add a message with pluralization information to the list.
     *
     * @see MessageBag::add()
     * @see Translator::trans()
     */
    public function addChoice(
        string $severity,
        string $message,
        array  $params = [],
        string $domain = 'messages'
    ): void;

    /**
     * Add a message object and extract the severity from the object.
     *
     * @param bool $toStart if to add the parameter to the start of the list of messages
     */
    public function addObject(Message $message, bool $toStart = false): void;

    /**
     * Generate error messages from a Symfony violation list.
     */
    public function addViolations(ConstraintViolationList $constraintViolationList): void;
}
