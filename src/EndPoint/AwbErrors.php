<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class AwbErrors extends EndPoint
{
    use CsvResult;

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_lista_erori_imp_awb_integrat.php';
}
