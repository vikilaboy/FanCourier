<?php

namespace FanCourier;

use FanCourier\Endpoint\EndpointManager;

class FanCourier extends EndpointManager
{
    const REPAYMENT_DEST = 'destinatar';
    const REPAYMENT_EXP = 'expeditor';

    const TYPE_INTERN = 'internal';
    const TYPE_EXTERN = 'export';
}
