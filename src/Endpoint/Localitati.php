<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class Localitati extends EndPoint
{

    use CsvResult;

    /**
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_distante_integrat.php';

}
