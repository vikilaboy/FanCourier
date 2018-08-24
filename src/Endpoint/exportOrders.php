<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class ExportOrders extends EndPoint
{
    use CsvResult;

    /**
     * @var string EndPoint Url
     */
    protected $url = 'https://www.selfawb.ro/export_comenzi_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(['data']);
    }

}
