<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Logic\ApiRequest\Transformer;

use DateTime;
use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiResourceServiceInterface;
use DemosEurope\DemosplanAddon\Contracts\Config\GlobalConfigInterface;
use DemosEurope\DemosplanAddon\Contracts\PermissionsInterface;

interface BaseTransformerInterface
{
    public function getClass(): string;

    /**
     * @deprecated use {@link ResourceTypeInterface::getTypeName()} where possible, because it should
     *             be the actual source for this information and not the transformer
     */
    public function getType(): string;

    public function getPermissions(): PermissionsInterface;

    /**
     * Please don't use `@required` for DI. It should only be used in base classes like this one.
     *
     * @required
     */
    public function setPermissions(PermissionsInterface $permissions): void;

    /**
     * @param DateTime $date
     */
    public function formatDate($date): string;

    /**
     * Please don't use `@required` for DI. It should only be used in base classes like this one.
     *
     * @required
     */
    public function setResourceService(ApiResourceServiceInterface $resourceService): void;

    public function getGlobalConfig(): GlobalConfigInterface;

    /**
     * Please don't use `@required` for DI. It should only be used in base classes like this one.
     *
     * @required
     */
    public function setGlobalConfig(GlobalConfigInterface $globalConfig): void;

}
