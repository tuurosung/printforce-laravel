<?php

namespace App\Domain\Invoices\Services;


use App\Domain\Invoices\Models\CustomerInvoice;
use App\DTOs\Invoices\CustomerInvoiceData;
use App\DTOs\Invoices\FilterInvoiceData;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvoiceService
{

    public function __construct(
        private readonly CustomerInvoice $model
    ){}


    public function createInvoice(CustomerInvoiceData $data): CustomerInvoice
    {
        $invoice = $this->model->create($data->toArray());
        ActiveInvoiceSession::set($invoice);
        return $invoice;
    }


    public function updateInvoice(CustomerInvoice $customerInvoice, CustomerInvoiceData $data): CustomerInvoice
    {
        $customerInvoice->update($data->toArray());
        return $customerInvoice;
    }


    public function deleteInvoice(CustomerInvoice $customerInvoice)
    {
        return DB::transaction(function () use ($customerInvoice) {

            if ($customerInvoice->hasServiceItems()) {
                $customerInvoice->invoiceItems()->delete();
            }

            $customerInvoice->delete();
        });
    }


    public function getInvoices(FilterInvoiceData $data): Collection
    {
        return CustomerInvoice::query()
            ->whereBetween('created_at', [$data->from, $data->to])
            ->when(
                $data->customerId,
                fn (Builder $query, string $customerId) => $query->whereHas(
                    'customer',
                    fn (Builder $query) => $query->where('customer_id', $customerId)
                ),
            )->orderBy('created_at', 'desc')
            ->get();
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

}
