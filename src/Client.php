<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace OandaApi;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package OandaApi
 */
class Client
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * OandaApi constructor.
     * @param string $apiKey
     * @param string $accountId
     * @param string $baseUrl
     */
    public function __construct(string $apiKey, string $accountId, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->accountId = $accountId;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @var
     */
    protected $httpClient;

    /**
     * @return array
     */
    public function getAccount()
    {
        $callParams = [
            'uri',
            'endpoint',
        ];

        $forexData = $this->call($callParams);
    }

    /**
     * @todo Implement
     * @param array $parameters
     * @return array
     */
    protected function call(array $parameters)
    {
        $client = $this->getClient($parameters);
        $this->configureClient($client, $parameters);
    }

    /**
     * @return GuzzleClient
     */
    protected function getClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new GuzzleClient();
        }
    }

    protected function configureClient(array $parameters)
    {
        $client = $this->getClient($parameters);
    }
}