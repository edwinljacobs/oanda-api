<?php

/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi\Response;
use EdwinLJacobs\OandaApi\Response\Account\Summary;

class Account extends Summary
{
    /**
     * @var array
     */
    protected $orders;

    /**
     * @var array
     */
    protected $positions;

    /**
     * @var array
     */
    protected $trades;

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param array $orders
     */
    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }

    /**
     * @return array
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * @param array $positions
     */
    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
    }

    /**
     * @return array
     */
    public function getTrades(): array
    {
        return $this->trades;
    }

    /**
     * @param array $trades
     */
    public function setTrades(array $trades): void
    {
        $this->trades = $trades;
    }
}