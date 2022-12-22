<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Configuration;

use Composer\Package\Loader\ArrayLoader;
use DemosEurope\DemosplanAddon\Permission\PermissionInitializerInterface;
use Symfony\Component\Yaml\Yaml;

abstract class AbstractAddonInfoProvider
{
    /**
     * The path to the addons composer.json
     * @var string
     */
    protected string $composerPath;

    protected ArrayLoader $loader;

    public function __construct()
    {
        $this->loader = new ArrayLoader();
    }

    /**
     * Provides an array containing all avilable base information for the addon.
     * This includes: Addon composer.json
     *
     * @return array<string, mixed>
     */
    public function getAddonInformation(): array
    {
        return Yaml::parseFile($this->composerPath);
    }

    /**
     * @return non-empty-string
     */
    final public function getAddonIdentifier(): string
    {
        return $this->loader->load($this->getAddonInformation())->getName();
    }

    abstract public function getPermissionInitializer(): PermissionInitializerInterface;
}
