<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

class DemosPlanAddonExtension extends Extension implements PrependExtensionInterface
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $container->loadFromExtension('doctrine', array(
            'orm' => array(
                'resolve_target_entities' => array(
                    'DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface' => 'demosplan\DemosPlanCoreBundle\Entity\Procedure\Procedure',
                    'DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface' => 'demosplan\DemosPlanCoreBundle\Entity\Statement\Statement',
                    'DemosEurope\DemosplanAddon\Contracts\Entities\FileContainerInterface' => 'demosplan\DemosPlanCoreBundle\Entity\File',
                    'DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface' => 'demosplan\DemosPlanCoreBundle\Entity\User\User',
                    'DemosEurope\DemosplanAddon\Contracts\Entities\EmailAddressInterface' => 'demosplan\DemosPlanCoreBundle\Entity\EmailAddress',
                    'DemosEurope\DemosplanAddon\Contracts\Entities\FileInterface' => 'demosplan\DemosPlanCoreBundle\Entity\File',

                )
            ),
        ));
    }
}
