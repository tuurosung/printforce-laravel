<?php

namespace App\Domain\Invoices\Services;

use App\Domain\Invoices\Contracts\InvoiceItemRepositoryInterface;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use Illuminate\Support\Facades\Log;

class InvoiceItemService
{
    public function __construct(
        private readonly InvoiceItemRepositoryInterface $invoiceItems,
    ){}



    public function addInvoiceItem(CustomerInvoice $customerInvoice, array $data): CustomerInvoiceItem
    {
        $customerInvoiceItem = $this->invoiceItems->addItem($customerInvoice, $data);

        if (! $customerInvoiceItem) {
            $error = "Unable to add item to invoice";
            Log::error($error);
            throw new \Exception($error);
        }

        return $customerInvoiceItem;

    }


    public function removeInvoiceItem(CustomerInvoiceItem $customerInvoiceItem): bool
    {
        return $this->invoiceItems->delete($customerInvoiceItem);
    }
}
