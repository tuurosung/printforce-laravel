<?php

namespace App\Abstracts\Invoices;

use App\Contracts\Invoices\InvoiceServiceContract;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use Illuminate\Support\Facades\Session;
use Override;

abstract class BaseInvoiceService implements InvoiceServiceContract
{

    // Session Management
    #[Override]
    public function setActiveInvoiceSession(CustomerInvoice $invoice): void
    {
        Session::put('active_customer_invoice', [
            'invoice_id' => $invoice->invoice_id,
            'customer_id' => $invoice->customer_id,
            'customer_category' => $invoice->customer->category
        ]);
    }


    #[Override]
    public function clearActiveInvoiceSession(): void
    {
        Session::forget('active_customer_invoice');
    }


    #[Override]
    public function getActiveInvoiceId(): ?string
    {
        return Session::get('active_customer_invoice.invoice_id');
    }


    #[Override]
    public function recalculateTotals(CustomerInvoice $invoice): void
    {
        $subTotal = $invoice->customerInvoiceItems()
            ->sum('total');

        $invoice->update([
            'sub_total' => $subTotal,
            // 'total' => $this->applyCharges($subTotal, $invoice)
        ]);
    }


    abstract protected function applyCharges(
        int $subTotal,
        CustomerInvoice $invoice
    ): int;


    public function updateItem(int $itemId, array $data): bool
    {
        return CustomerInvoiceItem::findOrFail('invoice_item_id', $itemId)
            ->update($data);
    }


    #[Override]
    public function removeItem(CustomerInvoiceItem $customerInvoiceItem): bool
    {
        return $customerInvoiceItem->delete();
    }
}
