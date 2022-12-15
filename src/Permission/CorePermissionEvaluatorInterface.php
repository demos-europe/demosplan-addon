<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Permission;

/**
 * Marker interface to allow for dependency injection.
 *
 * Can only evaluate core-specific permissions, not addon-specific permissions.
 *
 * To be implemented by the core only!
 */
interface CorePermissionEvaluatorInterface extends PermissionEvaluatorInterface
{
}
