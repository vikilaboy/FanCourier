<?php

namespace FanCourier\Plugin\Csv;

trait CsvResult
{
    public function getResult()
    {
        parent::curlCall();
        parent::csvToArray();

        return $this->result;
    }
}
