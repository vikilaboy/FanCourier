<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Exception\FanCourierApiException;

class Price extends EndPoint
{
    /**
     * Cache the original requirements.
     *
     * @var array
     */
    protected $requirementsCache = [];

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/tarif.php';

    /**
     * Type of the price calculation.
     *
     * @var string
     */
    protected $type = 'internal'; // `internal` or `export` price calculation.

    /**
     * Internal post requirements.
     *
     * @var array
     */
    protected $requirementsInternal = [
        'localitate_dest',
        'judet_dest',
        'plicuri',
        'colete',
        'greutate',
        'lungime',
        'latime',
        'inaltime',
        'val_decl',
        'plata_ramburs'
    ];

    /**
     * Internal export requirements.
     *
     * @var array
     */
    protected $requirementsExport = [
        'modtrim',
        'greutate',
        'pliccolet',
        's_inaltime',
        's_latime',
        's_lungime',
        'volum',
        'dest_tara',
        'tipcontinut',
        'km ext'
    ];


    public function __construct()
    {
        $this->setRequirements(['serviciu']);
        $this->requirementsCache = $this->postRequirements;
        $this->setRequirements($this->requirementsInternal);
    }


    /**
     * Set type of price calculation.
     *
     * @param string $type
     *
     * @throws FanCourierApiException
     */
    public function setType($type)
    {
        if ($type == 'internal' || $type == 'export') {
            switch ($type) {
                case 'internal':
                    $this->setRequirements(array_merge($this->requirementsCache, $this->requirementsInternal), true);
                    break;
                case 'export':
                    $this->setRequirements(array_merge($this->requirementsCache, $this->requirementsExport), true);
                    break;
            }
        } else {
            throw new FanCourierApiException('Invalid type. Accepted values "internal" or "export"', 400);
        }
    }
}
