<?php

declare(strict_types=1);

namespace App\DTOs\Invoices;

use App\Enums\Invoices\InvoiceStatusEnum;
use App\Enums\Invoices\InvoiceTypeEnum;
use App\Traits\ArrayableDTO;
use Carbon\CarbonImmutable;

final readonly class CustomerInvoiceData
{
    use ArrayableDTO;
    
    public function __construct(
        public ?string $customerId,
        public ?InvoiceTypeEnum $invoiceType,
        public ?string $invoiceDate,
        public CarbonImmutable $dueDate,
        public InvoiceStatusEnum $invoiceStatus
    ){}
}
