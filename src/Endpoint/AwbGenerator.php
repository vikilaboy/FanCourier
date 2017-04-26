<?php

namespace FanCourier\Endpoint;

use FanCourier\Endpoint\Endpoint;
use FanCourier\Plugin\Csv\CsvGenerator;
use FanCourier\Plugin\Csv\CsvResult;

class AwbGenerator extends Endpoint
{
    use CsvGenerator;
    use CsvResult;

    /**
     * Endpoint url.
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
