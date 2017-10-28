<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;


/**
 * Class Client
 * @package OandaApi
 */
public class Client
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var GuzzleClient
     */
    protected $httpClient;

    /**
     * OandaApi constructor.
     * @param string $token
     * @param string $baseUri
     */
    public function __construct(string $token, string $baseUri)
    {
        $this->token = $token;
        $this->baseUri = $baseUri;
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function get(string $endpoint, array $options = [])
    {
        return $this->request('GET', $endpoint, $options);
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function put(string $endpoint, array $options = [])
    {
        return $this->request('PUT', $endpoint, $options);
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function post(string $endpoint, array $options = [])
    {
        return $this->request('POST', $endpoint, $options);
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @return ResponseInterface
     */
    public function patch(string $endpoint, array $options = []) : ResponseInterface
    {
        return $this->request('PATCH', $endpoint, $options);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return mixed|ResponseInterface
     */
    protected function request(string $method, string $endpoint, array $options = [])
    {
        try {
            return $this->getClient()->request($method, $endpoint, $options);
        } catch (ClientException $e) {
            // Not yet implemented
        }
    }

    /**
     * @return GuzzleClient
     */
    protected function getClient(): GuzzleClient
    {
        if (!$this->httpClient) {
            $this->httpClient = new GuzzleClient($this->getGuzzleClientDefaultConfig());
        }

        return $this->httpClient;
    }

    /**
     * @return array
     */
    protected function getGuzzleClientDefaultConfig() : array
    {
        return [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => $this->token,
                'Accept-Datetime-Format' => 'Y-m-d H:i:s'
            ]
        ];
    }
}