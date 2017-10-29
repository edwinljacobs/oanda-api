<?php
/**
 * @author : ejacobs
 * Date: 10/29/17
 */

namespace EdwinLJacobs\OandaApi\Response\Account;


class InstrumentList
{
    /**
     * @var Instrument[]
     */
    protected $instruments = [];

    /**
     * InstrumentList constructor.
     * @param array $instrumentData
     */
    public function __construct(array $instrumentData)
    {
        foreach ($instrumentData as $instrument) {
            $this->instruments[$instrument['name']] = new Instrument($instrument);
        }
    }

    /**
     * @param string $name
     * @return Instrument
     * @throws \InvalidArgumentException
     */
    public function getInstrumentByName(string $name): Instrument
    {
        if (isset($this->instruments[$name])) {
            return $this->instruments[$name];
        }

        throw new \InvalidArgumentException(sprintf('Instrument with name %s is not defined', $name));
    }
}