<?php

namespace App\Domain\Invoices\Repositories;

use App\Domain\Invoices\Contracts\InvoiceRepositoryInterface;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Override;

class InvoiceRepository extends BaseService implements InvoiceRepositoryInterface
{
    public function __construct(
        private readonly CustomerInvoice $model
    ){}


    public function createInvoice(array $data): CustomerInvoice
    {
        return $this->transaction(function () use ($data) {
            return $this->model->create($data);
        });
    }

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


    protected function applyCharges(
        int $subTotal,
        CustomerInvoice $invoice
    ): int {
        return $subTotal;
    }


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


    public function addItem(CustomerInvoice $invoice, array $data): bool
    {
        $item = CustomerInvoiceItem::create([
            'invoice_id' => $invoice->invoice_id,
            ...$data
        ]);

        if ($item) {
            $this->recalculateTotals($invoice);
        }

        return true;
    }


    public function checkout(CustomerInvoice $invoice): void
    {
        DB::transaction(function () use ($invoice) {
            $this->recalculateTotals($invoice);
            $invoice->update([
                'status' => 'active'
            ]);

            $this->clearActiveInvoiceSession();
        });
    }


    public function getInvoices(array $filters = []): Collection
    {
        return CustomerInvoice::get();
    }

    public function cancel(CustomerInvoice $invoice): void
    {
        $invoice->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);

        $this->clearActiveInvoiceSession();
    }


    public function markAsPaid(CustomerInvoice $invoice): void
    {
        $invoice->update([
            'status' => 'paid',
            'paid_at' => now()
        ]);
    }
}
