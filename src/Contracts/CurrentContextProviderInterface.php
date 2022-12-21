<?php

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use Exception;
use Symfony\Component\Security\Core\User\UserInterface;

interface CurrentContextProviderInterface
{
    /**
     * @throws Exception When there is no current Procedure
     */
    public function getCurrentProcedure(): ProcedureInterface;

    /**
     * @throws Exception When there is no current User
     */
    public function getCurrentUser(): UserInterface;

    /**
     * @throws Exception When there is no current Customer
     */
    public function getCurrentCustomer(): CustomerInterface;
}
