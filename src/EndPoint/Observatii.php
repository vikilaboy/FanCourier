<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Csv\CsvResult;

class Observatii extends EndPoint {

  use CsvResult;

  /**
   * EndPoint url.
   *
   * @var string 
   */
  protected $url = 'https://www.selfawb.ro/export_observatii_integrat.php';

}
