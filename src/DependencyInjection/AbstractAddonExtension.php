<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * All addon extensions must extend this class. It handles the availability of the addons info provider
 */
abstract class AbstractAddonExtension extends Extension
{
    private bool $enabled;

    public function __construct(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * This will be executed when the bundle is processed during the container creation.
     * It will always register the addons information provider and load all the rest only when enabled.
     * @param array<string, mixed> $configs
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        if ($this->enabled) {
            $this->loadFullAddon($configs, $container);
        }
    }

    /**
     * Every extending class must implement this method to specify what is happening during
     * the container build if the addon is enabled.
     * @param array<string, mixed> $configs
     */
    abstract protected function loadFullAddon(array $configs, ContainerBuilder $container): void;
}
