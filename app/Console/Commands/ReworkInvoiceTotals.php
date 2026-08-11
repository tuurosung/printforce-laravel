<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:rework-invoice-totals')]
#[Description('Command description')]
class ReworkInvoiceTotals extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {

            // get invoices
            $invoices = DB::table('invoices')->get();

            foreach ($invoices as $invoice)
            {
                $subscriberId = $invoice->subscriber_id;
                $invoiceId = $invoice->invoice_id;

                $sumItems = DB::table('invoice_items')
                    ->where('deleted_at', NULL)
                    ->where('invoice_id', $invoiceId)
                    ->where('subscriber_id', $subscriberId)
                    ->sum('total');

                DB::table('invoices')
                    ->where('subscriber_id', $subscriberId)
                    ->where('invoice_id', $invoiceId)
                    ->update([
                        'sub_total' => $sumItems
                    ]);

                echo $invoiceId . '=>' . $invoice->invoice_total . ' vs ' . $sumItems . PHP_EOL;
            }
        });
    }
}
