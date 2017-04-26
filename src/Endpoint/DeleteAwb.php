<?php

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;

class DeleteAwb extends Endpoint
{
    /**
     * Endpoint url.
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
