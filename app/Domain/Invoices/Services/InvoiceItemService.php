<?php

namespace App\Domain\Invoices\Services;

use App\Domain\Invoices\Contracts\InvoiceItemRepositoryInterface;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;

class InvoiceItemService
{
    public function __construct(
        private readonly InvoiceItemRepositoryInterface $invoiceItems,
    ){}



    public function addInvoiceItem(CustomerInvoice $customerInvoice, array $data): CustomerInvoiceItem
    {
        return $this->invoiceItems->addItem($customerInvoice, $data);
    }


    public function removeInvoiceItem(CustomerInvoiceItem $customerInvoiceItem): bool
    {
        return $this->invoiceItems->delete($customerInvoiceItem);
    }
}
