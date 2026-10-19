<?php

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\MailSendInterface;
use Exception;

interface MailServiceInterface
{
    /**
     * Queues a mail for sending, based on a mail template stored in the database.
     *
     * @param string               $template    label of the mail template
     * @param string               $lang
     * @param string|array         $to
     * @param string|array         $from        used as reply-to; the mail itself is sent from the system address
     * @param string|array         $cc
     * @param string|array         $bcc
     * @param string               $scope
     * @param array<string, mixed> $vars        values replacing the placeholders of the template
     * @param array                $attachments
     * @param string|null          $replyTo
     *
     * @throws Exception
     */
    public function sendMail(
        $template,
        $lang,
        $to,
        $from,
        $cc,
        $bcc,
        $scope,
        $vars = [],
        $attachments = [],
        $replyTo = null,
    ): MailSendInterface;
}
