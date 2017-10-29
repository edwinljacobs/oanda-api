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
     * AbstractResponse constructor.
     * @param array $responseData
     */
    public function __construct($responseData)
    {
        $this->responseData = $responseData;
        // Initialize object with response data
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
     * @param string $function
     * @param array $args
     * @return mixed
     * @throws \RuntimeException
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
                return $this->data[$key];
            default:
                throw new \RuntimeException(sprintf('function %s is not defined', $function));
        }
    }
}