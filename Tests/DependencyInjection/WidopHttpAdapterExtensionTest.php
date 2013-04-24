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

    public function testBuzzService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapterBundle\Model\BuzzHttpAdapter',
            $this->container->get('widop_http_adapter.buzz')
        );
    }

    public function testCurlService()
    {
        $this->assertInstanceOf(
            'Widop\HttpAdapterBundle\Model\CurlHttpAdapter',
            $this->container->get('widop_http_adapter.curl')
        );
    }
}
