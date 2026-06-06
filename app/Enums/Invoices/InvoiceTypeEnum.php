<?php

namespace App\Enums\Invoices;

use App\Traits\System\EnumTrait;

enum InvoiceTypeEnum: string
{
    use EnumTrait;

    case SALES_INVOICE = 'sales_invoice';
    case PROFORMA_INVOICE = 'proforma_invoice';
    

    public static function default(): static
    {
        return self::SALES_INVOICE;
    }
}
