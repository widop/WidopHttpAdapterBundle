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
 * Curl Http adapter.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class CurlHttpAdapter implements HttpAdapterInterface
{
    /**
     * {@inheritdoc}
     */
    public function getContent($url, array $headers = array())
    {
        $curl = $this->initCurl();

        curl_setopt($curl, CURLOPT_URL, $url);

        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        $content = curl_exec($curl);

        curl_close($curl);

        if ($content === null) {
            throw new \Exception('An error occured when fetching the URL via cURL.');
        }

        return $content;
    }

    /**
     * {@inheritdoc}
     */
    public function postContent($url, array $headers = array(), $content = '')
    {
        $curl = $this->initCurl();

        curl_setopt($curl, CURLOPT_URL, $url);

        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

        $content = curl_exec($curl);

        curl_close($curl);

        if ($content === null) {
            throw new \Exception('An error occured when fetching the URL via cURL.');
        }

        return $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'curl';
    }

    /**
     * Initializes cUrl.
     *
     * @return ressource
     */
    protected function initCurl()
    {
        if (!function_exists('curl_init')) {
            throw new \Exception('cURL has to be enabled.');
        }

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        return $curl;
    }
}
