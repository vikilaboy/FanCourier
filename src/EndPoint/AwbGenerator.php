<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvGenerator;
use FanCourier\Plugin\Csv\CsvResult;

class AwbGenerator extends EndPoint
{
    use CsvGenerator;
    use CsvResult;

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/import_awb_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(['fisier']);
    }
}
