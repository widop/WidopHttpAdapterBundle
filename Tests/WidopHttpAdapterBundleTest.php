<?php

/*
 * This file is part of the Wid'op package.
 *
 * (c) Wid'op <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\HttpAdapterBundle\Tests;

use Widop\HttpAdapterBundle\WidopHttpAdapterBundle;

/**
 * Wid'op http adapter bundle test.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class WidopHttpAdapterBundleTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Widop\HttpAdapterBundle\WidopHttpAdapterBundle */
    protected $bundle;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->bundle = new WidopHttpAdapterBundle();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->bundle);
    }

    public function testInheritance()
    {
        $this->assertInstanceOf('Symfony\Component\HttpKernel\Bundle\Bundle', $this->bundle);
    }
}
