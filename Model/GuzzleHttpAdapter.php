<?php


namespace Widop\HttpAdapterBundle\Model;


use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\RequestException;
use Widop\HttpAdapterBundle\Exception\HttpAdapterException;

/**
 * Guzzle Http adapter.
 *
 * @author Gunnar Lium <gunnarlium@gmail.com>
 */
class GuzzleHttpAdapter implements HttpAdapterInterface
{
    /** @var  ClientInterface */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Gets the content fetched from the given URL.
     *
     * @param string $url The URL to request.
     * @param array $headers HTTP headers (optionnal).
     *
     * @throws \Exception If an error occured.
     *
     * @return string The fetched content.
     */
    public function getContent($url, array $headers = array())
    {
        try {
            $response = $this->client->get($url, $headers)->send();
            return $response->getBody(true);
        } catch (RequestException $e) {
            throw HttpAdapterException::cannotFetchUrl($url, $this->getName(), $e->getMessage());
        }
    }

    /**
     * Gets the content fetched from the given url & POST datas.
     *
     * @param string $url The URL to request.
     * @param array $headers HTTP headers (optional).
     * @param string $content The POST content (optional).
     *
     * @throws \Exception If an error occured.
     *
     * @return string The fetched content.
     */
    public function postContent($url, array $headers = array(), $content = '')
    {
        try {
            $response = $this->client->post($url, $headers, $content)->send();
            return $response->getBody(true);
        } catch (RequestException $e) {
            throw HttpAdapterException::cannotFetchUrl($url, $this->getName(), $e->getMessage());
        }
    }

    /**
     * Gets the name of the Http adapter.
     *
     * @return string The Http adapter name.
     */
    public function getName()
    {
        return 'guzzle';
    }

}
