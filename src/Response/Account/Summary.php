<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi\Response\Account;

use EdwinLJacobs\OandaApi\Response\AbstractResponse;

/**
 * Class Summary
 * @package EdwinLJacobs\OandaApi\Response
 *
 * Below are all properties available in the result of /v3/accounts/{accountId}/summary
 *
 * @method getId(): string
 * @method setId(string $id): void
 * @method getCreatedTime(): string
 * @method setCreatedTime(string $createdTime): void
 * @method getCurrency(): string
 * @method setCurrency(string $currency): void
 * @method getCreatedByUserId(): int
 * @method setCreatedByUserId(int $createdByUserId): void
 * @method getAlias(): string
 * @method setAlias(string $alias): void
 * @method getMarginRate(): float
 * @method setMarginRate(float $marginRate): void
 * @method getHedgingEnabled(): bool
 * @method setHedgingEnabled(bool $hedgingEnabled): void
 * @method getLastTransactionID(): int
 * @method setLastTransactionID(int $lastTransactionID): void
 * @method getBalance(): float
 * @method setBalance(float $balance): void
 * @method getOpenTradeCount(): int
 * @method setOpenTradeCount(int $openTradeCount): void
 * @method getOpenPositionCount(): int
 * @method setOpenPositionCount(int $openPositionCount): void
 * @method getPendingOrderCount(): int
 * @method setPendingOrderCount(int $pendingOrderCount): void
 * @method getPl(): float
 * @method setPl(float $pl): void
 * @method getResettablePL(): float
 * @method setResettablePL(float $resettablePL): void
 * @method getFinancing(): float
 * @method setFinancing(float $financing): void
 * @method getCommission(): float
 * @method setCommission(float $commission): void
 * @method getUnrealizedPL(): float
 * @method setUnrealizedPL(float $unrealisedPL): void
 * @method getNAV(): float
 * @method setNAV(float $NAV): void
 * @method getMarginUsed(): float
 * @method setMarginUsed(float $marginUsed): void
 * @method getMarginAvailable(): float
 * @method setMarginAvailable(float $marginAvailable): void
 * @method getPositionValue(): float
 * @method setPositionValue(float $positionValue): void
 * @method getMarginCloseoutUnrealizedPL(): float
 * @method setMarginCloseoutUnrealizedPL(float $marginCloseoutUnrealizedPL): void
 * @method getMarginCloseoutNAV(): float
 * @method setMarginCloseoutNAV(float $marginCloseoutNAV): void
 * @method getMarginCloseoutMarginUsed(): float
 * @method setMarginCloseoutMarginUsed(float $marginCloseoutMarginUsed): void
 * @method getMarginCloseoutPositionValue(): float
 * @method setMarginCloseoutPositionValue(float $marginCloseoutPositionValue): void
 * @method getMarginCloseoutPercent(): float
 * @method setMarginCloseoutPercent(float $marginCloseoutPercent): void
 * @method getWithdrawalLimit(): float
 * @method setWithdrawalLimit(float $withdrawalLimit): void
 * @method getMarginCallMarginUsed(): float
 * @method setMarginCallMarginUsed(float $marginCallMarginUsed): void
 * @method getMarginCallPercent(): float
 * @method setMarginCallPercent(float $marginCallPercent): void
 */
class Summary extends AbstractResponse
{

}