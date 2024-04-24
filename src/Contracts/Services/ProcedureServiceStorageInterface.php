<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Exception;

interface ProcedureServiceStorageInterface
{
    public function administrationNewHandler(array $data, string $currentUserId): ProcedureInterface;
    /**
     * @param array  $data
     * @param string $procedureID
     *
     * @return array
     *
     * @throws Exception
     */
    public function administrationGlobalGisHandler($data, $procedureID);

    /**
     * Save Procedure data.
     *
     * @param array $data
     * @param bool  $checkMandatoryErrors
     *
     * @return array|false
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws TransactionRequiredException
     * @throws Exception
     */
    public function administrationEditHandler($data, $checkMandatoryErrors = true)
}
