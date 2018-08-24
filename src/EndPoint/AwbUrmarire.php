<?php

namespace FanCourier\EndPoint;

/**
 * Controller for FanCourier new AWB tracking.
 *
 * @author csaba.balint@reea.net
 */
class AwbUrmarire extends EndPoint
{

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/awb_tracking_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(['AWB', 'display_mode']);
    }

}
