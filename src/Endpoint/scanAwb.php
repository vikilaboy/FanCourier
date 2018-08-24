<?php

namespace FanCourier\EndPoint;

class ScanAwb extends EndPoint
{

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/download_awb_scan_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(['AWB']);
    }

}
