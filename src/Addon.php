<?php

declare(strict_types=1);

namespace demosplan\DemosPlanAddonBundle\src;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * The base class for all addon bundles
 */
class Addon extends Bundle
{
    private bool $enabled;

    public function __construct($enabled = false)
    {
        $this->enabled = $enabled;
    }

    /**
     * Creates the bundle's container extension.
     *
     * @return ExtensionInterface|null
     */
    protected function createContainerExtension()
    {
        return class_exists($class = $this->getContainerExtensionClass()) ? new $class($this->enabled) : null;
    }

}
