<?php

declare(strict_types=1);

namespace App\DTOs\Invoices;

use Carbon\CarbonImmutable;
use Livewire\Wireable;

final class FilterInvoiceData implements Wireable
{
    public function __construct(
        public CarbonImmutable $from,
        public CarbonImmutable $to,
        public ?string $customerId = null
    ) {}


    public static function forCurrentMonth(): self
    {
        $now = CarbonImmutable::now();
        return new self($now->startOfMonth(), $now->endOfMonth());
    }


    public function toLivewire(): array
    {
        return [
            'from' => $this->from->toDateString(),
            'to' => $this->to->toDateString(),
            'customerId' => $this->customerId,
        ];
    }

    /** @param array{from: string, to: string, customerId: ?string} $value */
    public static function fromLivewire($value): self
    {
        return new self(
            CarbonImmutable::parse($value['from'])->startOfDay(),
            CarbonImmutable::parse($value['to'])->endOfDay(),
            $value['customerId'] ?? null
        );
    }
}
