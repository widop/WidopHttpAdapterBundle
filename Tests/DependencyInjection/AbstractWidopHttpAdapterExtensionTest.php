<?php

/*
 * This file is part of the Wid'op package.
 *
 * (c) Wid'op <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\HttpAdapterBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Widop\HttpAdapterBundle\DependencyInjection\WidopHttpAdapterExtension;

/**
 * Abstract Wid'op http adapter extension test.
 *
 * @author Geoffrey Brier <geoffrey.brier@gmail.com>
 * @author Gelo <geloen.eric@gmail.com>
 */
abstract class AbstractWidopHttpAdapterExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Symfony\Component\DependencyInjection\ContainerBuilder */
    protected $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($extension = new WidopHttpAdapterExtension());
        $this->container->loadFromExtension($extension->getAlias());
    }

    /**
     * {@ineritdoc}
     */
    protected function tearDown()
    {
        unset($this->container);
    }

    /**
     * Loads a configuration.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container     The container builder.
     * @param string                                                  $configuration The configuration name.
     */
    abstract protected function loadConfiguration(ContainerBuilder $container, $configuration);

    /**
     * Gets the http adapters.
     *
     * @return array The http adapters.
     */
    public function httpAdapterProvider()
    {
        return array(
            array('buzz', 'BuzzHttpAdapter'),
            array('curl', 'CurlHttpAdapter'),
            array('guzzle', 'GuzzleHttpAdapter'),
            array('stream', 'StreamHttpAdapter'),
            array('zend', 'ZendHttpAdapter'),
        );
    }

    /**
     * @dataProvider httpAdapterProvider
     */
    public function testHttpAdapterWithoutConfiguration($service, $class)
    {
        $this->loadConfiguration($this->container, 'empty');
        $this->container->compile();

        $httpAdapter = $this->container->get(sprintf('widop_http_adapter.%s', $service));

        $this->assertInstanceOf(sprintf('Widop\HttpAdapter\%s', $class), $httpAdapter);
        $this->assertSame(5, $httpAdapter->getMaxRedirects());
    }

    /**
     * @dataProvider httpAdapterProvider
     */
    public function testHttpAdapterWithMaxRedirects($service, $class)
    {
        $this->loadConfiguration($this->container, 'max_redirects');
        $this->container->compile();

        $this->assertSame(10, $this->container->get(sprintf('widop_http_adapter.%s', $service))->getMaxRedirects());
    }
}
