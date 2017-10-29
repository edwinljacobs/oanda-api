<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response;


/**
 * Class Client
 * @package OandaApi
 */
class Client
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
     * @var string
     */
    protected $dateTimeFormat = 'UNIX';

    /**
     * @return string
     */
    public function getDateTimeFormat(): string
    {
        return $this->dateTimeFormat;
    }

    /**
     * @param string $dateTimeFormat
     * @throws \InvalidArgumentException
     */
    public function setDateTimeFormat(string $dateTimeFormat): void
    {
        if (!in_array($dateTimeFormat, ['UNIX', 'RFC3339'], true)) {
            throw new \InvalidArgumentException(sprintf('DateTimeFormat %s is not allowed', $dateTimeFormat));
        }
        $this->dateTimeFormat = $dateTimeFormat;
    }

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
     * @param bool $addDateTimeFormatHeader
     * @return array
     * @throws \RuntimeException
     */
    public function get(string $endpoint, array $options = [], $addDateTimeFormatHeader = true): array
    {
        if ($addDateTimeFormatHeader) {
            $options = $this->addDateTimeFormatHeaderToOptions($options);
        }
        return $this->request('GET', $endpoint, $options);
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @param bool $addDateTimeFormatHeader
     * @return array
     * @throws \RuntimeException
     */
    public function put(string $endpoint, array $options = [], $addDateTimeFormatHeader = true): array
    {
        if ($addDateTimeFormatHeader) {
            $options = $this->addDateTimeFormatHeaderToOptions($options);
        }
        return $this->request('PUT', $endpoint, $options);
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @param bool $addDateTimeFormatHeader
     * @return array
     * @throws \RuntimeException
     */
    public function post(string $endpoint, array $options = [], $addDateTimeFormatHeader = true): array
    {
        if ($addDateTimeFormatHeader) {
            $options = $this->addDateTimeFormatHeaderToOptions($options);
        }
        return $this->request('POST', $endpoint, $options);
    }

    /**
     * @param string $endpoint
     * @param array $options
     * @param bool $addDateTimeFormatHeader
     * @return array
     * @throws \RuntimeException
     */
    public function patch(string $endpoint, array $options = [], $addDateTimeFormatHeader = true): array
    {
        if ($addDateTimeFormatHeader) {
            $options = $this->addDateTimeFormatHeaderToOptions($options);
        }
        return $this->request('PATCH', $endpoint, $options);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return array
     * @throws \RuntimeException
     */
    protected function request(string $method, string $endpoint, array $options = []): array
    {
        $response = $this->getClient()->request($method, $endpoint, $options);
        return $this->validateResponse($response);
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
     * @param array $options
     * @return array
     */
    protected function addDateTimeFormatHeaderToOptions(array $options): array
    {
        return array_merge_recursive($options, ['headers' => ['Accept-Datetime-Format' => $this->getDateTimeFormat()]]);
    }

    /**
     * @return array
     */
    protected function getGuzzleClientDefaultConfig() : array
    {
        return [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ]
        ];
    }

    /**
     * @param Response $response
     * @return array
     * @throws \RuntimeException
     */
    protected function validateResponse($response): array
    {
        $content = $response->getBody()->getContents();
        if (empty($content)) {
            throw new \RuntimeException('No data while reading from response stream');
        }
        $content = json_decode($content, true);
        if ($content === null) {
            throw new \RuntimeException('Response data could not be converted from json');
        }
        return $content;
    }

}