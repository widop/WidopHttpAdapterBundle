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

/**
 * Http adapter interface.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
interface HttpAdapterInterface
{
    /**
     * Gets the content fetched from the given URL.
     *
     * @param string $url     The URL to request.
     * @param array  $headers HTTP headers (optionnal).
     *
     * @return string
     */
    function getContent($url, array $headers = array());

    /**
     * Gets the name of the Http adapter.
     *
     * @return string
     */
    function getName();
}
