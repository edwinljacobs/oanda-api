<?php
/**
 * @author : ejacobs
 * Date: 10/28/17
 */

namespace EdwinLJacobs\OandaApi\Response\Account;

use EdwinLJacobs\OandaApi\Response\AbstractResponse;

/**
 * Class Instrument
 * @package EdwinLJacobs\OandaApi\Response\Account
 *
 * @method getName(): string
 * @method getType(): string
 * @method getDisplayName(): string
 * @method getPipLocation(): int
 * @method getDisplayPrecision(): float
 * @method getTradeUnitsPrecision(): float
 * @method getMinimumTradeSize(): float
 * @method getMaximumTrailingStopDistance(): float
 * @method getMinimumTrailingStopDistance(): float
 * @method getMaximumPositionSize(): float
 * @method getMaximumOrderUnits(): float
 * @method getMarginRate(): float
 */
class Instrument extends AbstractResponse
{

}