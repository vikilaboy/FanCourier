<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class Strazi extends EndPoint
{
    use CsvResult;

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_strazi_integrat.php';

}
