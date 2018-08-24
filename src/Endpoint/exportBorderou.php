<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class ExportBorderou extends EndPoint
{
    use CsvResult;

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/export_borderou_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(['data']);
    }

}
