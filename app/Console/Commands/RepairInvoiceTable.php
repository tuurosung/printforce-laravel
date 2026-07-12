<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

#[Signature('app:repair-invoice-table')]
#[Description('Command description')]
class RepairInvoiceTable extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Repairing invoice table');




        // Idempotency Impementation
        Schema::table('invoice_items', function (Blueprint $table) {

            // Adjust Column lengths
            $table->string('subscriber_id', 64)->change();
            $table->string('invoice_id', 64)->nullable()->change();
            $table->string('service_id', 64)->nullable()->change();

            if (!Schema::hasIndex('invoice_items', 'unique')){
                $table->unique(['subscriber_id', 'invoice_id', 'service_id'], 'idempotency_lock');
            }

        });

        $this->info('Repair complete');
    }
}
