<?php

namespace FanCourier\EndPoint;

class NewOrder extends EndPoint
{

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = 'https://www.selfawb.ro/comanda_curier_integrat.php';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->setRequirements(
            [
                'pers_contact',
                'tel',
                'email',
                'greutate',
                'inaltime',
                'lungime',
                'latime',
                'ora_ridicare',
            ]
        );
    }

}
