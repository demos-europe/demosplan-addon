<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Logic\Rpc;

use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use JsonSchema\Exception\InvalidSchemaException;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Interface to be implemented by the classes that execute/solve RPC Methods.
 */
interface RpcMethodSolverInterface
{
    public function supports(string $method): bool;

    /**
     * @param array|object $rpcRequests
     *
     * @return array<int|string,mixed>
     */
    public function execute(?ProcedureInterface $procedure, $rpcRequests): array;

    /**
     * Returns true if given a request with an array of rpc methods supported by the same
     * solver, they must be executed in a transactional mode.
     */
    public function isTransactional(): bool;

    /**
     * @throws InvalidSchemaException
     * @throws AccessDeniedException
     */
    public function validateRpcRequest(object $rpcRequest): void;
}
