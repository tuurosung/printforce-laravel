<?php

namespace App\Domain\Invoices\Services;


use App\Domain\Invoices\Models\CustomerInvoice;
use App\DTOs\Invoices\CustomerInvoiceData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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


    public function getInvoices(array $filters = []): Collection
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

}
