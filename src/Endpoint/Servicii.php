<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class Servicii extends EndPoint
{
    use CsvResult;

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_servicii_integrat.php';

}
