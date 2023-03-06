<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Form\Procedure;

interface AbstractProcedureFormTypeInterface
{
    public const AGENCY_MAIN_EMAIL_ADDRESS = 'agencyMainEmailAddress';

    public const AGENCY_EXTRA_EMAIL_ADDRESSES = 'agencyExtraEmailAddresses';

    public const ALLOWED_SEGMENT_ACCESS_PROCEDURE_IDS = 'allowedSegmentAccessProcedureIds';
}
