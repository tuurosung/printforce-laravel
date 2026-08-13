<?php

namespace App\Domain\Invoices\Contracts;

use App\Domain\Invoices\Models\CustomerInvoice;
use App\Domain\Invoices\Models\CustomerInvoiceItem;

interface InvoiceItemRepositoryInterface
{
    public function addItem(CustomerInvoice $customerInvoice, array $data): CustomerInvoiceItem;
    public function updateItem(CustomerInvoiceItem $customerInvoiceItem, array $data): bool;
    public function delete(CustomerInvoiceItem $customerInvoiceItem): bool;


    // Lifecycle
    public function itemExists(CustomerInvoice $customerInvoice, string $serviceId): bool;
}
