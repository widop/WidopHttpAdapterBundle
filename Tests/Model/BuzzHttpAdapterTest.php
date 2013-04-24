<?php

/*
 * This file is part of the Wid'op package.
 *
 * (c) Wid'op <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\HttpAdapterBundle\Tests\Model;

use Widop\HttpAdapterBundle\Model\BuzzHttpAdapter;

/**
 * Buzz http adapter test.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class BuzzHttpAdapterTest extends AbstractHttpAdapterTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->httpAdapter = new BuzzHttpAdapter();
    }

    public function testName()
    {
        $this->assertSame('buzz', $this->httpAdapter->getName());
    }
}
