<?php

namespace App\Services\Invoices;

use App\Domain\Invoices\Contracts\InvoiceRepositoryInterface;
use App\Models\Invoices\CustomerInvoice;

class InvoiceService
{

    public function __construct(
        private readonly InvoiceRepositoryInterface $invoiceRepository
    ){}


    protected function applyCharges(int $subTotal, CustomerInvoice $invoice): int
    {
        return $subTotal;
    }
}
