<?php

declare(strict_types=1);

namespace Cws\Bundle\QuillJsBundle\DependencyInjection;

use Cws\Bundle\QuillJsBundle\Service\QuillJsConfigInterface;
use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CwsQuillJsExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new Loader\YamlFileLoader(
            container: $container,
            locator: new FileLocator(paths: sprintf('%s/../Resources/config', __DIR__))
        );

        $loader->load(resource: 'config.yaml');

        $configuration = new Configuration();

        $config = $this->processConfiguration(
            configuration: $configuration,
            configs: $configs
        );

        $container->getDefinition(id: QuillJsConfigInterface::class)
            ->setArgument(key: 0, value: $config);
    }
}
