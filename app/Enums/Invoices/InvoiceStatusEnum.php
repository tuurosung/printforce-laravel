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
    case PAID = 'paid';


    public function flag(): string
    {
        return match ($this) {
            self::DRAFT, self::PENDING => 'warning',
            self::ACTIVE,
            self::PAID => 'primary',
            self::CANCELLED => 'danger',
            default => '',
        };
    }


    public function allowedTransitions(): array
    {
        return match($this) {
            self::DRAFT => [self::ACTIVE, self::CANCELLED],
            self::ACTIVE => [self::PAID, self::CANCELLED],
            self::PAID,
            self::CANCELLED => []
        };
    }


    public function canTransitionTo(self $target): bool
    {
        return in_array($target, $this->allowedTransitions(), true);
    }


    public function isTerminal(): bool
    {
        return $this->allowedTransitions() === [];
    }
}
