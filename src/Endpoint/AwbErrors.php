<?php

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;
use FanCourier\Plugin\Csv\CsvResult;

class AwbErrors extends Endpoint
{
    use CsvResult;

    /**
     * Endpoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_lista_erori_imp_awb_integrat.php';
}
