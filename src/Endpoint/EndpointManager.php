<?php

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\EndpointManagerInterface;
use FanCourier\Plugin\Exeption\FanCourierApiExeption;

abstract class EndpointManager implements EndpointManagerInterface
{
    /**
     * Returning the endpoint controller.
     *
     * @param string $endpoint - Name of the endpoint controller.
     * @param array  $params   - Array of params to send for ::setUp function.
     *
     * @return Endpoint
     *
     * @throws FanCourierApiExeption - No endpoint exeption.
     *
     */
    public function getEndpoint($endpoint)
    {
        if (class_exists(sprintf('FanCourier\Endpoint\%s', $endpoint))) {
            return call_user_func(sprintf('FanCourier\Endpoint\%s::newEndpoint', $endpoint));
        } else {
            throw new FanCourierApiExeption(sprintf('Unrecognized endpoint:%s', $endpoint), 400);
        }
    }
}
