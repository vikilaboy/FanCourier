<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Exception\FanCourierApiException;

abstract class EndPointManager implements EndPointManagerInterface
{
    /**
     * Returning the endpoint controller.
     *
     * @param string $endpoint - Name of the endpoint controller.
     * @param array  $params   - Array of params to send for ::setUp function.
     *
     * @return EndPoint
     *
     * @throws FanCourierApiException - No endpoint exeption.
     *
     */
    public function getEndpoint($endpoint)
    {
        if (class_exists(sprintf('FanCourier\EndPoint\%s', ucfirst($endpoint)))) {
            return call_user_func(sprintf('FanCourier\EndPoint\%s::newEndpoint', ucfirst($endpoint)));
        } else {
            throw new FanCourierApiException(sprintf('Unrecognized endpoint:%s', ucfirst($endpoint)), 400);
        }
    }
}
