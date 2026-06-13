<?php

namespace App\Console\Commands\Healers;

use App\Enums\Invoices\InvoiceTypeEnum;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class HealInvoiceTable
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private Command $command
    ) {}


    public function run(): bool
    {
        $this->command->info('Healing Invoices Table...');

        // Update invoice types
        $this->updateInvoiceTypes();

        // Invoices Table
        Schema::table('invoices', function (Blueprint $table) {

            // Add SoftDeletes to invoices table
            if (!Schema::hasColumn('invoices', 'deleted_at')) {
                $table->softDeletes();
            }

            // Change invoice_type to enum
            if (!Schema::hasColumn('invoices', 'invoice_type')) {
                $table->enum('invoice_type', ['proforma_invoice', 'sales_invoice'])->default('pending');
            } else {
                $table->enum('invoice_type', ['proforma_invoice', 'sales_invoice'])->default('sales_invoice')->change();
            }

            // Drop id column
            if (Schema::hasColumn('invoices', 'id')) {
                $table->dropColumn('id');
            }

            // add uuid primary key
            if (!Schema::hasColumn('invoices', 'invoice_uuid')) {
                $table->uuid('invoice_uuid')->after('sn');
            } else {
                // $table->uuid('invoice_uuid')->after('sn')->change();
            }
        });


        $this->populateUuids();



        $this->command->info('Invoices Table Healed.');
        return true;
    }


    protected function updateInvoiceTypes()
    {
        $this->command->info('Updating invoice types...');

        // update all invalid invoice type to sales_invoice
        $count = DB::table('invoices')
            ->whereNotIn('invoice_type', InvoiceTypeEnum::values())
            ->update(['invoice_type' => InvoiceTypeEnum::default()->value]);

        $count > 0
            ? $this->command->info("Healed {$count} invoice types -> defauled to sales_invoice.")
            : $this->command->info("All invoice types are valid.");

    }

    protected function populateUuids()
    {

        // check if invoice_items table has invoice_uuid column
        if (!Schema::hasColumn('invoice_items', 'invoice_uuid')) {
            return;
        }

        $allInvoices = DB::table('invoices')->whereNull('invoice_uuid')->orWhere('invoice_uuid', '')->get();

        if ($allInvoices->isEmpty()) {
            $this->command->info('No Invoices to update.');
            return;
        }

        $this->command->info("Updating {$allInvoices->count()} Invoices...");

        foreach ($allInvoices as $invoice) {

            $invoice_uuid = Str::uuid();

            DB::table('invoices')
                ->where('invoice_id', $invoice->invoice_id)
                ->update([
                    'invoice_uuid' => $invoice_uuid
                ]);

            DB::table('invoice_items')
                ->where('invoice_id', $invoice->invoice_id)
                ->update([
                    'invoice_uuid' => $invoice_uuid
                ]);
        }


        $this->command->info("Updated {$allInvoices->count()} Invoices.");
    }
}
