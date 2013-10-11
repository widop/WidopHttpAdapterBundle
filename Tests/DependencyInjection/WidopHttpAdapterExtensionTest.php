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
 * Wid'op http adapter extension test.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class WidopHttpAdapterExtensionTest extends \PHPUnit_Framework_TestCase
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
        $this->container->compile();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->container);
    }

    public function testCurlService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapter\CurlHttpAdapter',
            $this->container->get('widop_http_adapter.curl')
        );
    }

    public function testStreamService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapter\StreamHttpAdapter',
            $this->container->get('widop_http_adapter.stream')
        );
    }

    public function testBuzzService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapter\BuzzHttpAdapter',
            $this->container->get('widop_http_adapter.buzz')
        );
    }

    public function testGuzzleService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapter\GuzzleHttpAdapter',
            $this->container->get('widop_http_adapter.guzzle')
        );
    }

    public function testZendService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapter\ZendHttpAdapter',
            $this->container->get('widop_http_adapter.zend')
        );
    }
}
