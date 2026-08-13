<?php

namespace App\Exceptions;

use App\Enums\Invoices\InvoiceStatusEnum;
use Exception;

class InvoiceTransitionException extends Exception
{
    public static function illegal(InvoiceStatusEnum $from, InvoiceStatusEnum $to): self
    {
        return new self(sprintf(
            'Cannot move invoice from %s to %s.',
            $from->value,
            $to->value
        ));
    }
}
