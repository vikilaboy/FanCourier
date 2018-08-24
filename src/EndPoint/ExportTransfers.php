<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class ExportTransfers extends EndPoint
{
    use CsvResult;

    /**
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_raport_viramente_integrat.php';

    /**
     * ExportTransfers constructor.
     */
    public function __construct()
    {
        $this->setRequirements(['data']);
    }

}
