<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Logic\Rpc;

interface RpcErrorGeneratorInterface
{
    final public const ACCESS_DENIED_CODE = -32768;
    final public const ACCESS_DENIED_MESSAGE = 'Access denied';

    final public const INTERNAL_ERROR_CODE = -32603;
    final public const INTERNAL_ERROR_MESSAGE = 'Internal error';

    final public const INVALID_PARAMS_CODE = -32602;
    final public const INVALID_PARAMS_MESSAGE = 'Invalid params';

    final public const INVALID_REQUEST_CODE = -32600;
    final public const INVALID_REQUEST_MESSAGE = 'Invalid Request';

    final public const METHOD_NOT_FOUND_CODE = -32601;
    final public const METHOD_NOT_FOUND_MESSAGE = 'Method not found';

    final public const PARSE_ERROR_CODE = -32700;
    final public const PARSE_ERROR_MESSAGE = 'Parse error';

    final public const SERVER_ERROR_CODE = -32000;
    final public const SERVER_ERROR_MESSAGE = 'Server error';

    public function parseError(?object $rpcRequest = null): object;
    public function invalidRequest(?object $rpcRequest = null): object;
    public function methodNotFound(?object $rpcRequest = null): object;
    public function invalidParams(?object $rpcRequest = null): object;
    public function internalError(?object $rpcRequest = null): object;
    public function serverError(?object $rpcRequest = null): object;
    public function accessDenied(?object $rpcRequest = null): object;
    public function generate(int $errorCode, $rpcRequest = null): object;
}
