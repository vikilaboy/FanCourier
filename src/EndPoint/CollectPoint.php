<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class CollectPoint extends EndPoint
{
    use CsvResult;

    /**
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_locatii_collect_point_integrat.php';
}
