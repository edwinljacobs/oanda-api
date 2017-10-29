<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi;

use EdwinLJacobs\OandaApi\Response\Account;
use EdwinLJacobs\OandaApi\Response\Account\Change;
use EdwinLJacobs\OandaApi\Response\Account\Summary;
use EdwinLJacobs\OandaApi\Response\Account\Instrument;

/**
 * Class Account
 * @package EdwinLJacobs\OandaApi
 */
class Api
{
    const ENDPOINT_ACCOUNTS = '/v3/accounts/';
    const ENDPOINT_INSTRUMENTS = '/v3/instruments/';

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
     * @var Client;
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
     * @return string
     */
    public function getDateTimeFormat(): string
    {
        return $this->getClient()->getDateTimeFormat();
    }

    /**
     * @param string $dateTimeFormat
     * @throws \InvalidArgumentException
     */
    public function setDateTimeFormat(string $dateTimeFormat): void
    {
        $this->getClient()->setDateTimeFormat($dateTimeFormat);
    }

    /**
     * @param string|null $accountId
     * @return string
     * @throws \InvalidArgumentException
     */
    protected function getAccountIdEndpoint(string $accountId = null): string
    {
        return self::ENDPOINT_ACCOUNTS . $this->getAccountId($accountId);
    }

    /**
     * @return Client
     */
    protected function getClient(): Client
    {
        if (!$this->client) {
            $this->client = new Client($this->token, $this->baseUri);
        }

        return $this->client;
    }


    /** ---------------------------------------- API METHODS ACCOUNT ---------------------------------------- */

    /**
     * @param string $accountId
     * @return Account
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getAccount(string $accountId = null): Account
    {
        $response = $this->getClient()->get($this->getAccountIdEndpoint($accountId), [], false);
        return new Account($response['account']);
    }

    /**
     * @param string $accountId
     * @return Summary
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getAccountSummary(string $accountId = null): Summary
    {
        $response = $this->getClient()->get($this->getAccountIdEndpoint($accountId) . '/summary');
        return new Summary($response['account']);
    }

    /**
     * @param array $instruments
     * @param string|null $accountId
     * @return Instrument
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getAccountInstruments(array $instruments = [], string $accountId = null): Instrument
    {
        if (!empty($instruments)) {
            $options['query']['instrumentName'] = implode(',', $instruments);
        }
        $response = $this->getClient()->get($this->getAccountIdEndpoint($accountId) . '/instruments');
        return new Instrument($response['instruments']);
    }

    /**
     * @param int $sinceTransactionId
     * @param string $accountId
     * @return Change
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function getAccountChanges($sinceTransactionId, string $accountId = null): Change
    {
        $options['query']['sinceTransactionID'] = $sinceTransactionId;
        $response = $this->getClient()->get($this->getAccountIdEndpoint($accountId) . '/changes', $options);
        return new Change($response['changes']);
    }

    /**
     * @param string $accountId
     * @param array $options
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function patchAccountConfiguration(string $accountId = null, array $options)
    {
        $response = $this->getClient()->patch($this->getAccountIdEndpoint($accountId) . '/configuration', json_encode($options));
    }
}