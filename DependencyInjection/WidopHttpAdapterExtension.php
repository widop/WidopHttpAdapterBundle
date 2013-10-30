<?php

/*
 * This file is part of the Wid'op package.
 *
 * (c) Wid'op <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\HttpAdapterBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Wid'op Http adapter extension.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class WidopHttpAdapterExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $this->loadMaxRedirects($config, $container);
    }

    /**
     * Loads the max redirects in all http adapters.
     *
     * @param array                                                   $config    The configuration.
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container The container.
     */
    private function loadMaxRedirects(array $config, ContainerBuilder $container)
    {
        $services = array('buzz', 'curl', 'guzzle', 'stream', 'zend');

        foreach ($services as $service) {
            $container
                ->getDefinition(sprintf('widop_http_adapter.%s', $service))
                ->addMethodCall('setMaxRedirects', array($config['max_redirects']));
        }
    }
}
