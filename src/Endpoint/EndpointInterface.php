<?php

namespace FanCourier\Endpoint;

interface EndpointInterface
{
    public static function newEndpoint();

    public function getResult();

    public function setParams(array $post_params);

    public function checkErrors();
}
