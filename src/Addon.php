<?php

declare(strict_types=1);

namespace DemosEurope\DemosPlanAddon;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * The base class for all addon bundles
 */
class Addon extends Bundle
{
    public function __construct(private bool $enabled = false) {}

    /**
     * Creates the bundle's container extension. 
     * 
     * Since Addons are stacked on top of Symfony Bundles they use
     * the normal bundle extension mechanism with a little twist:
     * 
     * If an addon is not enabled, it's service registrations are not
     * loaded into the core. To facilitate that, we switch between the
     * Addon-provided extension class and a demosplan-internal one which is
     * only powerful enough to provide access to an Addon's meta information.
     */
    protected function createContainerExtension(): ?ExtensionInterface
    {
        return class_exists($class = $this->getContainerExtensionClass()) ? new $class($this->enabled) : null;
    }
}
