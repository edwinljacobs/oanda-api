<?php
/**
 * @author : ejacobs
 * Date: 10/29/17
 */

namespace EdwinLJacobs\OandaApi\Response;

abstract class AbstractResponse
{
    /**
     * @var array Oanda response data json decoded
     */
    protected $data;

    /**
     * @var array
     */
    protected $ownData = [];

    /**
     * AbstractResponse constructor.
     * @param array $responseData
     */
    public function __construct($responseData)
    {
        foreach ($responseData as $property => $value) {
            $setter = 'set' . ucfirst($property);
            if (ctype_digit($value)) {
                $value = (int) $value;
            } else if (is_numeric($value)) {
                $value = (float) $value;
            }
            $this->$setter($value);
        }
    }

    /**
     * Magic getters and setters, the reason we chose this is because API may or may not interface extra properties in the future.
     * If so the response models would break if rigorously defined using "hard" properties. All data available in responses are doc blocked
     * as getters and setters in the corresponding classes so that we still have code completion.
     *
     * @param string $function
     * @param array $args
     * @return mixed
     * @throws \Exception
     */
    public function __call(string $function, array $args)
    {
        $type = substr($function, 0, 3);
        $key = lcfirst(substr($function, 3));
        switch ($type) {
            case 'set':
                $this->data[$key] = reset($args);
                break;
            case 'get':
                if (!isset($this->data[$key])) {
                    throw new \RuntimeException(sprintf('data %s is not defined', $key));
                }
                return $this->data[$key];
        }
        throw new \RuntimeException(sprintf('function %s is not defined', $function));
    }

    /**
     * If so desired one can keep track of own data.
     *
     * @param string $key
     * @param mixed $value
     */
    public function setOwnData($key, $value): void
    {
        $this->ownData[$key] = $value;
    }

    /**
     * If return own data by key.
     *
     * @param $key
     * @return mixed|null
     */
    public function getOwnData($key)
    {
        return $this->ownData[$key] ?? null;
    }
}