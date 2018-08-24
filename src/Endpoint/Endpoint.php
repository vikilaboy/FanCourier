<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Curl;
use FanCourier\Plugin\Exception\FanCourierApiException;

abstract class EndPoint implements EndPointInterface
{
    use ParamError;

    /**
     * @var null
     */
    public $result = null;

    /**
     * If result is a csv file keep or not the header.
     *
     * @var bool
     */
    public $resultWithHeader = true;

    /**
     * @return mixed
     */
    public static function newEndpoint()
    {
        $class = get_called_class();

        return new $class();
    }

    /**
     * Set params for CURL call.
     *
     * @param array $postParams
     */
    public function setParams(array $postParams)
    {
        $this->postParams = $postParams;
    }

    /**
     * Make CURL call.
     *
     * @throws FanCourierApiException
     */
    public function curlCall()
    {
        $this->checkErrors();

        $curl = new Curl($this->url);
        $rp = $curl->curlRequest($this->postParams);

        if ($rp['info']['http_code'] == 200) {
            $this->result = $rp['response'];
        } else {
            throw new FanCourierApiException($rp['response'], $rp['info']['http_code']);
        }
    }

    /**
     * @return array
     * @throws FanCourierApiException
     */
    public function getResult()
    {
        $this->curlCall();

        return $this->result;
    }

    /**
     * Set no header value.
     */
    public function noHeader()
    {
        $this->resultWithHeader = false;
    }

    /**
     * Convert csv to array
     */
    public function csvToArray()
    {
        $this->result = str_getcsv($this->result, PHP_EOL);

        if (!$this->resultWithHeader) {
            unset($this->result[0]);
        }
    }

}
