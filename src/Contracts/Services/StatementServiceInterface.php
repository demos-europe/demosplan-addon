<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface StatementServiceInterface
{
    /**
     * Will execute various checks and generate an EntityContentChange entry.
     *
     * @see https://yaits.demos-deutschland.de/w/demosplan/functions/at_detail_view/ Wiki: Detailseite Stellungnahme/Stellungnahmengruppe
     *
     * @param StatementInterface $updatedStatement Statement as object
     * @param bool      $ignoreAssignment Determines if a assignment statement will be updated regardless
     * @param bool      $ignoreCluster    Determines if a clustered statement will be updated regardless
     * @param bool      $ignoreOriginal
     *
     * @return StatementInterface|false|null if successful: the updated Statement object
     */
    public function updateStatementFromObject($updatedStatement, $ignoreAssignment = false, $ignoreCluster = false, $ignoreOriginal = false);
}
