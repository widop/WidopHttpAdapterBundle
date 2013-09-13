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

use Guzzle\Http\Client;
use Widop\HttpAdapterBundle\Model\GuzzleHttpAdapter;

/**
 * Buzz http adapter test.
 *
 * @author Gunnar Lium <gunnarlium@gmail.com>
 */
class GuzzleHttpAdapterTest extends AbstractHttpAdapterTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $client = new Client();
        $this->httpAdapter = new GuzzleHttpAdapter($client);
    }

    public function testName()
    {
        $this->assertSame('guzzle', $this->httpAdapter->getName());
    }
}
