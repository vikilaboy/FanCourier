<?php

namespace FanCourier\EndPoint;

class DeleteAwb extends EndPoint
{
    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/delete_awb_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(['AWB']);
    }
}
