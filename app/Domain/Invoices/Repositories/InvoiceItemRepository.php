<?php

namespace App\Domain\Invoices\Repositories;

use App\Domain\Invoices\Contracts\InvoiceItemRepositoryInterface;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;

class InvoiceItemRepository implements InvoiceItemRepositoryInterface
{
    public function __construct(
        private CustomerInvoice $customerInvoice,
        private CustomerInvoiceItem $model
    ){}




    public function delete(CustomerInvoiceItem $customerInvoiceItem): bool
    {
        return $customerInvoiceItem->delete();
    }

    public function addItem(CustomerInvoice $customerInvoice, array $data): CustomerInvoiceItem
    {
        return $customerInvoice->invoiceItems()->create($data);
    }


    public function updateItem(CustomerInvoiceItem $customerInvoiceItem, array $data): bool
    {
        return $customerInvoiceItem->update($data);
    }


    public function itemExists(CustomerInvoice $customerInvoice, string $serviceId): bool
    {
        return $customerInvoice->hasItem($serviceId);
    }
}
