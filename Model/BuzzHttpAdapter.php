<?php

/*
 * This file is part of the Widop package.
 *
 * (c) Widop <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\HttpAdapterBundle\Model;

use Buzz\Browser;

/**
 * Buzz Http adapter.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class BuzzHttpAdapter implements HttpAdapterInterface
{
    /**
     * @var \Buzz\Browser The buzz browser.
     */
    private $browser;

    /**
     * Constructor.
     *
     * @param \Buzz\Browser $browser The buzz browser.
     */
    public function __construct(Browser $browser = null)
    {
        if ($browser === null) {
            $this->browser = new Browser();
        } else {
            $this->browser = $browser;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getContent($url)
    {
        $response = $this->browser->get($url);
        $content  = $response->getContent();

        return $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'buzz';
    }
}
