<?php

namespace App\Enums;

use App\Traits\System\EnumTrait;

enum PaymentMethodsEnum: string
{
    use EnumTrait;

    case CASH = 'cash';
    case CHEQUE = 'cheque';
    case MTN_MOMO = 'mtn_momo';
    case TELECEL_CASH = 'telecel_cash';
}
