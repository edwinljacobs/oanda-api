<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi;

use EdwinLJacobs\OandaApi\Client as OandaClient;
use EdwinLJacobs\OandaApi\Model\Account as AccountModel;

/**
 * Class Account
 * @package EdwinLJacobs\OandaApi
 */
class Account
{
    const ENDPOINT_ACCOUNTS = '/v3/accounts/';

    /**
     * @var string Api token
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
     * @param string $accountId
     */
    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * @param string|null $accountId
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getAccountId(string $accountId = null): string
    {
        $accountId = $accountId ?? $this->accountId;
        if ($accountId === null) {
            throw new \InvalidArgumentException('Could not retrieve account id, it is not set nor specified');
        }

        return $accountId;
    }

    /**
     * @return Client
     */
    protected function getClient(): OandaClient
    {
        if (!$this->client) {
            $this->client = new OandaClient($this->token, $this->baseUri);
        }

        return $this->client;
    }


    /** ---------------------------------------- API METHODS ---------------------------------------- */

    /**
     * @return
     */
    public function getAccounts()
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS);
    }

    /**
     * @param string $accountId
     * @return AccountModel
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getAccount(string $accountId = null): AccountModel
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $this->getAccountId($accountId));
        $accountInfo = $response->getBody()->getContents();
        if (empty($accountInfo)) {
            throw new \RuntimeException('No account info found when reading response stream');
        }

        return new AccountModel(json_decode($accountInfo, true));
    }

    /**
     * @param string $accountId
     * @throws \InvalidArgumentException
     */
    public function getAccountSummary(string $accountId = null)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $this->getAccountId($accountId) . '/summary');
    }

    /**
     * @param string $accountId
     * @throws \InvalidArgumentException
     */
    public function getAccountInstruments(string $accountId = null)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $this->getAccountId($accountId) . '/instruments');
    }

    /**
     * @param string $accountId
     * @throws \InvalidArgumentException
     */
    public function getAccountChanges(string $accountId = null)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $this->getAccountId($accountId) . '/changes');
    }

    /**
     * @param string $accountId
     * @param array $options
     */
    public function patchAccountConfiguration(string $accountId = null, array $options)
    {
        $response = $this->getClient()->get(self::ENDPOINT_ACCOUNTS . $accountId . '/configuration', json_encode($options));
    }
}