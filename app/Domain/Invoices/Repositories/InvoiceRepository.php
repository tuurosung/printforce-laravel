<?php

namespace App\Domain\Invoices\Repositories;

use App\Domain\Invoices\Contracts\InvoiceRepositoryInterface;
use App\Enums\Invoices\InvoiceStatusEnum;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Override;

class InvoiceRepository extends BaseService implements InvoiceRepositoryInterface
{
    public function __construct(
        private readonly CustomerInvoice $model
    ){}

    #[Override]
    protected function modelClass(): string
    {
        return CustomerInvoice::class;
    }


    public function allInvoices(array $filters = []): Collection
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }


    public function recalculateTotals(CustomerInvoice $invoice): void
    {
        $subTotal = $invoice->invoiceItems()
            ->sum('total');

        $invoice->update([
            'sub_total' => $subTotal,
            // 'total' => $this->applyCharges($subTotal, $invoice),
        ]);
    }


    protected function applyCharges(
        int $subTotal,
        CustomerInvoice $invoice
    ): int {
        return $subTotal;
    }


    // Lifecycle
    public function checkout(CustomerInvoice $invoice): void
    {
        DB::transaction(function () use ($invoice) {
            
            $invoice->update([
                'status' => InvoiceStatusEnum::ACTIVE
            ]);

            $this->clearActiveInvoiceSession();
        });
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


    // Session Management
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
}
