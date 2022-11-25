<?php

namespace DemosEurope\DemosPlanAddon\Configuration;

/**
 * All addons need to have an information provider which implements this interface.
 * The information provided by these will be used to fill the AddonRegistry
 */
interface AddonInfoProviderInterface
{
    /**
     * Provides an array with the addons new permissions
     * @return array<int, string>
     */
    public function getAvailablePermissions(): array;

    /**
     * Provides an array with all subscribed events
     * @return array<int, string>
     */
    public function getSubscribedEvents(): array;
}
