<?php

namespace App\Domain\Invoices\Contracts;

use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;

interface InvoiceItemRepositoryInterface
{
    public function addItem(CustomerInvoice $customerInvoice, array $data): CustomerInvoiceItem;
    public function updateItem(CustomerInvoiceItem $customerInvoiceItem, array $data): bool;
    public function delete(CustomerInvoiceItem $customerInvoiceItem): bool;


    // Lifecycle
    public function itemExists(CustomerInvoice $customerInvoice, string $serviceId): bool;
}
