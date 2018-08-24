<?php

namespace FanCourier\Plugin\Exception;

use Exception;

class FanCourierApiException extends Exception
{
    /**
     * FanCourierApiExeption constructor.
     * @param string $message
     * @param int $code
     * @param FanCourierApiException|null $previous
     */
    public function __construct($message = "", $code = 0, FanCourierApiException $previous = null)
    {
        $message .= sprintf('On line: %s at %s', parent::getLine(), parent::getFile());

        parent::__construct($message, $code, $previous);
    }
}
