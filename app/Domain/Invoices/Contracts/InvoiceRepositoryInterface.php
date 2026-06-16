<?php

namespace App\Domain\Invoices\Contracts;

use App\Models\Invoices\CustomerInvoice;
use Illuminate\Database\Eloquent\Collection;

interface InvoiceRepositoryInterface
{

    // CRUD Operations
    public function allInvoices(array $filters = []): Collection;


    // totals
    public function recalculateTotals(CustomerInvoice $invoice): void;


    // lifecycle
    public function checkout(CustomerInvoice $invoice): void;
    public function markAsPaid(CustomerInvoice $invoice): void;
    public function cancel(CustomerInvoice $invoice): void;


    // session management
    public function setActiveInvoiceSession(CustomerInvoice $invoice):void;
    public function clearActiveInvoiceSession(): void;
    public function getActiveInvoiceId(): ?string;

}
