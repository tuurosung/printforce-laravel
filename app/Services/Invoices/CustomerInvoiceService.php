<?php

namespace App\Services\Invoices;

use App\Abstracts\Invoices\BaseInvoiceService;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Override;

class CustomerInvoiceService extends BaseInvoiceService
{
    public function createInvoice(array $data): CustomerInvoice
    {
        return DB::transaction(function () use ($data) {
            return CustomerInvoice::create($data);
        });
    }


    #[Override]
    public function getInvoices(array $filters = []): Collection
    {
        return CustomerInvoice::query()
            ->get();
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


    public function markAsPaid(CustomerInvoice $invoice): void
    {
        $invoice->update([
            'status' => 'paid',
            'paid_at' => now()
        ]);
    }


    public function cancel(CustomerInvoice $invoice): void
    {
        $invoice->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);

        $this->clearActiveInvoiceSession();
    }


    protected function applyCharges(int $subTotal, CustomerInvoice $invoice): int
    {
        return $subTotal;
    }
}
