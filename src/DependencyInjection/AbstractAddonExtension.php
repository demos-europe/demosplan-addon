<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\DependencyInjection;

use DemosEurope\DemosplanAddon\Configuration\AddonInfoProviderInterface;
use DemosEurope\DemosplanAddon\Permission\AbstractPermissionEvaluator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
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
        $infoProviderClass = $this->getInfoProviderClass();
        $infoProviderDefinition = new Definition($infoProviderClass);
        $infoProviderDefinition->addTag('demosplan_addon.addon_info_provider');
        $container->setDefinition($infoProviderClass, $infoProviderDefinition);

        $permissionEvaluatorClass = $this->getPermissionEvaluatorClass();
        $permissionEvaluatorDefinition = new Definition($permissionEvaluatorClass);
        $container->setDefinition($permissionEvaluatorClass, $permissionEvaluatorDefinition);

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

    /**
     * @return class-string<AddonInfoProviderInterface>
     */
    abstract protected function getInfoProviderClass(): string;

    /**
     * @return class-string<AbstractPermissionEvaluator>
     */
    abstract protected function getPermissionEvaluatorClass(): string;
}
