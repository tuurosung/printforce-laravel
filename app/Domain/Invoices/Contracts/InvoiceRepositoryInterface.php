<?php

namespace App\Domain\Invoices\Contracts;

use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use Illuminate\Database\Eloquent\Collection;

interface InvoiceRepositoryInterface
{

    // CRUD Operations
    public function getInvoices(array $filters = []): Collection;
    public function createInvoice(array $data): CustomerInvoice;
    public function addItem(CustomerInvoice $invoice, array $data): bool;
    public function updateItem(int $itemId, array $data): bool;
    public function removeItem(CustomerInvoiceItem $customerInvoiceItem): bool;


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
