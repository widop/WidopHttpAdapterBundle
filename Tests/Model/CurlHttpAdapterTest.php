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

use Widop\HttpAdapterBundle\Model\CurlHttpAdapter;

/**
 * Curl http adapter test.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class CurlHttpAdapterTest extends AbstractHttpAdapterTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->httpAdapter = new CurlHttpAdapter();
    }

    public function testName()
    {
        $this->assertSame('curl', $this->httpAdapter->getName());
    }
}
