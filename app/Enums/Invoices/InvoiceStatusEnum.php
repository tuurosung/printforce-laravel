<?php

namespace App\Enums\Invoices;

use App\Traits\System\EnumTrait;

enum InvoiceStatusEnum: string
{
    use EnumTrait;

    case DRAFT = 'draft';
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case CANCELLED = 'cancelled';


    public function flag(): string
    {
        return match ($this) {
            self::DRAFT, self::PENDING => 'warning',
            self::ACTIVE => 'primary',
            self::CANCELLED => 'danger',
            default => '',
        };
    }
}
