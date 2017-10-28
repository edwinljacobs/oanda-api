<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi;

use EdwinLJacobs\OandaApi\Client as OandaClient;

/**
 * Class Account
 * @package EdwinLJacobs\OandaApi
 */
class Account
{
    const ENDPOINT_ACCOUNTS = '/v3/accounts/';

    /**
     * @var string api token
     */
    protected $token;

    /**
     * @var string Oanda base uri, this differs for test and production
     */
    protected $baseUri;

    /**
     * @var string Can be used to set a default account id when interacting with Oanda
     */
    protected $accountId;

    /**
     * @var OandaClient;
     */
    protected $client;

    /**
     * Account constructor.
     * @param string $token Access token for API
     * @param string $baseUri Base uri for API, this differs for test and live
     * @param string|null $accountId
     */
    public function __construct(string $token, string $baseUri, string $accountId = null)
    {
        $this->token = $token;
        $this->baseUri = $baseUri;
        if ($accountId) {
            $this->accountId = $accountId;
        }
    }

    /**
     * @return
     */
    public function getAccounts()
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS);
    }

    /**
     * @param string $accountId
     */
    public function getAccount(string $accountId)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $accountId);
    }

    /**
     * @param string $accountId
     */
    public function getAccountSummary(string $accountId)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $accountId . '/summary');
    }

    /**
     * @param string $accountId
     */
    public function getAccountInstruments(string $accountId)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $accountId . '/instruments');
    }

    /**
     * @param string $accountId
     */
    public function getAccountChanges(string $accountId)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $accountId . '/changes');
    }

    /**
     * @param string $accountId
     */
    public function patchAccountConfiguration(string $accountId, array $options)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $accountId . '/configuration', json_encode($options));
    }

    /**
     * @return Client
     */
    protected function getClient() : OandaClient
    {
        if ($this->client) {
            $this->client = new OandaClient($this->token, $this->baseUri);
        }

        return $this->client;
    }
}