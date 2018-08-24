<?php

namespace FanCourier\EndPoint;

interface EndPointInterface
{
    public static function newEndpoint();

    public function getResult();

    public function setParams(array $postParams);

    public function checkErrors();
}
