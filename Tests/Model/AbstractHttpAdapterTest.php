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

/**
 * Abstract http adapter test.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
abstract class AbstractHttpAdapterTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Widop\HttpAdapterBundle\Model\HttpAdapterInterface */
    protected $httpAdapter;

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->httpAdapter);
    }

    abstract public function testName();

    public function testGetContentWithoutHeaders()
    {
        $this->assertNotEmpty($this->httpAdapter->getContent('www.google.fr'));
    }

    public function testGetContentWithHeaders()
    {
        $this->assertNotEmpty($this->httpAdapter->getContent('www.google.fr', array('Accept-Charset' => 'utf-8')));
    }

    /**
     * @expectedException \Exception
     */
    public function testGetContentWithInvalidUrl()
    {
        $this->httpAdapter->getContent('foo');
    }

    public function testPostContentWithoutHeaders()
    {
        $this->assertNotEmpty($this->httpAdapter->postContent('www.google.fr'));
    }

    public function testPostContentWithHeaders()
    {
        $this->assertNotEmpty($this->httpAdapter->postContent('www.google.fr', array('Accept-Charset' => 'utf-8')));
    }

    public function testPostContentWithHeadersAndData()
    {
        $this->assertNotEmpty(
            $this->httpAdapter->postContent(
                'www.google.fr',
                array('Accept-Charset' => 'utf-8'),
                http_build_query(array('param' => 'value'))
            )
        );
    }

    /**
     * @expectedException \Exception
     */
    public function testPostContentWithInvalidUrl()
    {
        $this->httpAdapter->postContent('foo');
    }
}
