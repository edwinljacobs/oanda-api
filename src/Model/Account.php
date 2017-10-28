<?php

/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi\Model;

class Account
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $createdTime;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var int
     */
    protected $createdByUserId;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var float
     */
    protected $marginRate;

    /**
     * @var bool
     */
    protected $hedgingEnabled;

    /**
     * @var int
     */
    protected $lastTransactionID;

    /**
     * @var float
     */
    protected $balance;

    /**
     * @var int
     */
    protected $openTradeCount;

    /**
     * @var int
     */
    protected $openPositionCount;

    /**
     * @var int
     */
    protected $pendingOrderCount;

    /**
     * @var float
     */
    protected $pl;

    /**
     * @var float
     */
    protected $resettablePL;

    /**
     * @var float
     */
    protected $financing;

    /**
     * @var float
     */
    protected $commission;

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
     * @var float
     */
    protected $unrealizedPL;

    /**
     * @var float
     */
    protected $NAV;

    /**
     * @var float
     */
    protected $marginUsed;

    /**
     * @var float
     */
    protected $marginAvailable;

    /**
     * @var float
     */
    protected $positionValue;

    /**
     * @var float
     */
    protected $marginCloseoutUnrealizedPL;

    /**
     * @var float
     */
    protected $marginCloseoutNAV;

    /**
     * @var float
     */
    protected $marginCloseoutMarginUsed;

    /**
     * @var float
     */
    protected $marginCloseoutPositionValue;

    /**
     * @var float
     */
    protected $marginCloseoutPercent;

    /**
     * @var float
     */
    protected $withdrawalLimit;

    /**
     * @var float
     */
    protected $marginCallMarginUsed;

    /**
     * @var float
     */
    protected $marginCallPercent;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    /**
     * @param string $createdTime
     */
    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getCreatedByUserId(): int
    {
        return $this->createdByUserId;
    }

    /**
     * @param int $createdByUserId
     */
    public function setCreatedByUserId(int $createdByUserId): void
    {
        $this->createdByUserId = $createdByUserId;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @return float
     */
    public function getMarginRate(): float
    {
        return $this->marginRate;
    }

    /**
     * @param float $marginRate
     */
    public function setMarginRate(float $marginRate): void
    {
        $this->marginRate = $marginRate;
    }

    /**
     * @return bool
     */
    public function isHedgingEnabled(): bool
    {
        return $this->hedgingEnabled;
    }

    /**
     * @param bool $hedgingEnabled
     */
    public function setHedgingEnabled(bool $hedgingEnabled): void
    {
        $this->hedgingEnabled = $hedgingEnabled;
    }

    /**
     * @return int
     */
    public function getLastTransactionID(): int
    {
        return $this->lastTransactionID;
    }

    /**
     * @param int $lastTransactionID
     */
    public function setLastTransactionID(int $lastTransactionID): void
    {
        $this->lastTransactionID = $lastTransactionID;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     */
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getOpenTradeCount(): int
    {
        return $this->openTradeCount;
    }

    /**
     * @param int $openTradeCount
     */
    public function setOpenTradeCount(int $openTradeCount): void
    {
        $this->openTradeCount = $openTradeCount;
    }

    /**
     * @return int
     */
    public function getOpenPositionCount(): int
    {
        return $this->openPositionCount;
    }

    /**
     * @param int $openPositionCount
     */
    public function setOpenPositionCount(int $openPositionCount): void
    {
        $this->openPositionCount = $openPositionCount;
    }

    /**
     * @return int
     */
    public function getPendingOrderCount(): int
    {
        return $this->pendingOrderCount;
    }

    /**
     * @param int $pendingOrderCount
     */
    public function setPendingOrderCount(int $pendingOrderCount): void
    {
        $this->pendingOrderCount = $pendingOrderCount;
    }

    /**
     * @return float
     */
    public function getPl(): float
    {
        return $this->pl;
    }

    /**
     * @param float $pl
     */
    public function setPl(float $pl): void
    {
        $this->pl = $pl;
    }

    /**
     * @return float
     */
    public function getResettablePL(): float
    {
        return $this->resettablePL;
    }

    /**
     * @param float $resettablePL
     */
    public function setResettablePL(float $resettablePL): void
    {
        $this->resettablePL = $resettablePL;
    }

    /**
     * @return float
     */
    public function getFinancing(): float
    {
        return $this->financing;
    }

    /**
     * @param float $financing
     */
    public function setFinancing(float $financing): void
    {
        $this->financing = $financing;
    }

    /**
     * @return float
     */
    public function getCommission(): float
    {
        return $this->commission;
    }

    /**
     * @param float $commission
     */
    public function setCommission(float $commission): void
    {
        $this->commission = $commission;
    }

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

    /**
     * @return float
     */
    public function getUnrealizedPL(): float
    {
        return $this->unrealizedPL;
    }

    /**
     * @param float $unrealizedPL
     */
    public function setUnrealizedPL(float $unrealizedPL): void
    {
        $this->unrealizedPL = $unrealizedPL;
    }

    /**
     * @return float
     */
    public function getNAV(): float
    {
        return $this->NAV;
    }

    /**
     * @param float $NAV
     */
    public function setNAV(float $NAV): void
    {
        $this->NAV = $NAV;
    }

    /**
     * @return float
     */
    public function getMarginUsed(): float
    {
        return $this->marginUsed;
    }

    /**
     * @param float $marginUsed
     */
    public function setMarginUsed(float $marginUsed): void
    {
        $this->marginUsed = $marginUsed;
    }

    /**
     * @return float
     */
    public function getMarginAvailable(): float
    {
        return $this->marginAvailable;
    }

    /**
     * @param float $marginAvailable
     */
    public function setMarginAvailable(float $marginAvailable): void
    {
        $this->marginAvailable = $marginAvailable;
    }

    /**
     * @return float
     */
    public function getPositionValue(): float
    {
        return $this->positionValue;
    }

    /**
     * @param float $positionValue
     */
    public function setPositionValue(float $positionValue): void
    {
        $this->positionValue = $positionValue;
    }

    /**
     * @return float
     */
    public function getMarginCloseoutUnrealizedPL(): float
    {
        return $this->marginCloseoutUnrealizedPL;
    }

    /**
     * @param float $marginCloseoutUnrealizedPL
     */
    public function setMarginCloseoutUnrealizedPL(float $marginCloseoutUnrealizedPL): void
    {
        $this->marginCloseoutUnrealizedPL = $marginCloseoutUnrealizedPL;
    }

    /**
     * @return float
     */
    public function getMarginCloseoutNAV(): float
    {
        return $this->marginCloseoutNAV;
    }

    /**
     * @param float $marginCloseoutNAV
     */
    public function setMarginCloseoutNAV(float $marginCloseoutNAV): void
    {
        $this->marginCloseoutNAV = $marginCloseoutNAV;
    }

    /**
     * @return float
     */
    public function getMarginCloseoutMarginUsed(): float
    {
        return $this->marginCloseoutMarginUsed;
    }

    /**
     * @param float $marginCloseoutMarginUsed
     */
    public function setMarginCloseoutMarginUsed(float $marginCloseoutMarginUsed): void
    {
        $this->marginCloseoutMarginUsed = $marginCloseoutMarginUsed;
    }

    /**
     * @return float
     */
    public function getMarginCloseoutPositionValue(): float
    {
        return $this->marginCloseoutPositionValue;
    }

    /**
     * @param float $marginCloseoutPositionValue
     */
    public function setMarginCloseoutPositionValue(float $marginCloseoutPositionValue): void
    {
        $this->marginCloseoutPositionValue = $marginCloseoutPositionValue;
    }

    /**
     * @return float
     */
    public function getMarginCloseoutPercent(): float
    {
        return $this->marginCloseoutPercent;
    }

    /**
     * @param float $marginCloseoutPercent
     */
    public function setMarginCloseoutPercent(float $marginCloseoutPercent): void
    {
        $this->marginCloseoutPercent = $marginCloseoutPercent;
    }

    /**
     * @return float
     */
    public function getWithdrawalLimit(): float
    {
        return $this->withdrawalLimit;
    }

    /**
     * @param float $withdrawalLimit
     */
    public function setWithdrawalLimit(float $withdrawalLimit): void
    {
        $this->withdrawalLimit = $withdrawalLimit;
    }

    /**
     * @return float
     */
    public function getMarginCallMarginUsed(): float
    {
        return $this->marginCallMarginUsed;
    }

    /**
     * @param float $marginCallMarginUsed
     */
    public function setMarginCallMarginUsed(float $marginCallMarginUsed): void
    {
        $this->marginCallMarginUsed = $marginCallMarginUsed;
    }

    /**
     * @return float
     */
    public function getMarginCallPercent(): float
    {
        return $this->marginCallPercent;
    }

    /**
     * @param float $marginCallPercent
     */
    public function setMarginCallPercent(float $marginCallPercent): void
    {
        $this->marginCallPercent = $marginCallPercent;
    }

    /**
     * Account constructor.
     * @param array $accountInfo
     */
    public function __construct(array $accountInfo)
    {
        // Initialize object with account info data
        foreach ($accountInfo as $property => $value) {
            $setter = 'set' . ucfirst($property);
            if (ctype_digit($value)) {
                $value = (int) $value;
            } else if (is_numeric($value)) {
                $value = (float) $value;
            }
            $this->$setter($value);
        }
    }
}