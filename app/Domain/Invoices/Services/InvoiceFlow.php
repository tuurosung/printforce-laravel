<?php

namespace App\Domain\Invoices\Services;

use App\Domain\Invoices\Models\CustomerInvoice;
use App\Enums\Invoices\InvoiceStatusEnum;
use App\Exceptions\InvoiceTransitionException;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\DB;

final class InvoiceFlow
{
    public function checkout(CustomerInvoice $invoice): CustomerInvoice
    {
        $invoice->sub_total = $invoice->invoiceItems->sum('total');
        $invoice->save();

        return $this->transition($invoice, InvoiceStatusEnum::ACTIVE);
    }


    public function cancel(CustomerInvoice $invoice, ?string $reason = null): CustomerInvoice
    {
        return $this->transition($invoice, InvoiceStatusEnum::CANCELLED, [
            'cancelled_at' => now()
        ]);
    }


    public function markAsPaid(CustomerInvoice $invoice, ?CarbonInterface  $paidAt = null): CustomerInvoice
    {
        return $this->transition($invoice, InvoiceStatusEnum::PAID, [
            'paid_at' => $paidAt ?? now()
        ]);
    }


    private function transition(
        CustomerInvoice $invoice,
        InvoiceStatusEnum $target,
        array $attributes = []
    ): CustomerInvoice {

        return DB:: transaction(function() use ($invoice, $target, $attributes) {

            $fresh = CustomerInvoice::query()
                ->whereKey($invoice->getKey())
                ->lockForUpdate()
                ->firstOrFail();


            if (! $fresh->status->canTransitionTo($target)) {
                throw InvoiceTransitionException::illegal($fresh->status, $target);
            }

            $fresh->update([...$attributes, 'status' => $target]);

            return $fresh;
        });
    }
}
