<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\DependencyInjection;

use DemosEurope\DemosplanAddon\Contracts\Entities\EmailAddressInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\FileInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
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
                    ProcedureInterface::class => 'demosplan\DemosPlanCoreBundle\Entity\Procedure\Procedure',
                    StatementInterface::class => 'demosplan\DemosPlanCoreBundle\Entity\Statement\Statement',
                    UserInterface::class => 'demosplan\DemosPlanCoreBundle\Entity\User\User',
                    EmailAddressInterface::class => 'demosplan\DemosPlanCoreBundle\Entity\EmailAddress',
                    FileInterface::class => 'demosplan\DemosPlanCoreBundle\Entity\File',
                )
            ),
        ));
    }
}
