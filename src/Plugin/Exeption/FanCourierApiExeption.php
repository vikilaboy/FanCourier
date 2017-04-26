<?php

namespace FanCourier\Plugin\Exeption;

use Exception;

class FanCourierApiExeption extends Exception
{
    /**
     * @see Exception::__construct()
     */
    public function __construct($message = "", $code = 0, FanCourierApiExeption $previous = null)
    {
        $message .= sprintf('On line: %s at %s', parent::getLine(), parent::getFile());

        parent::__construct($message, $code, $previous);
    }
}
