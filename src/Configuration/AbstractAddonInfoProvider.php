<?php

declare(strict_types=1);

namespace DemosEurope\DemosPlanAddon\Configuration;

use Symfony\Component\Yaml\Yaml;

abstract class AbstractAddonInfoProvider
{
    /**
     * The path to the addons composer.json
     * @var string
     */
    protected string $composerPath;

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
}
