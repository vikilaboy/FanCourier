<?php

namespace FanCourier;

use FanCourier\EndPoint\EndPointManager;

class FanCourier extends EndPointManager
{
    const REPAYMENT_DEST = 'destinatar';
    const REPAYMENT_EXP = 'expeditor';

    const TYPE_INTERN = 'internal';
    const TYPE_EXTERN = 'export';
}
