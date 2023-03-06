<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

interface TransactionServiceInterface
{
    /**
     * Executes a given task inside a transaction and returns the result of the task.
     * If an exception is thrown inside the task then the transaction will be rolled back
     * and the received exception will be rethrown.
     *
     * @template T
     *
     * @phpstan-param callable(EntityManager): T $task
     *
     * @phpstan-return T
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ConnectionException
     */
    public function executeAndFlushInTransaction(callable $task);
}
