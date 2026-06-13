<?php

namespace App\Console\Commands\Healers;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HealInvoiceItemsTable
{
    protected const STALENESS_TTL_IN_DAYS = 30;


    /**
     * Create a new class instance.
     */
    public function __construct(
        private Command $command
    ) {}


    public function run(): bool
    {
        $this->command->info('Healing Invoice Items Table...');

        $this->restructureTable();

        return true;
    }


    protected function restructureTable()
    {
        $this->command->info('Restucturing Invoice Items Table...');

        Schema::table('invoice_items', function (Blueprint $table) {

            // Add SoftDeletes to invoice_items table
            if (!Schema::hasColumn('invoice_items', 'deleted_at')) {
                $table->softDeletes();
            } else {
                $table->timestamp('deleted_at')->nullable()->after('status')->change();
            }

            // Assign and constrain foreign keys
            if (!Schema::hasColumn('invoice_items', 'invoice_id')) {
                $table->foreign('invoice_id')->constrained('invoices')->onDelete('cascade');
            } else {
                $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
            }

            // Create or update invoice_uuid column
            if (!Schema::hasColumn('invoice_items', 'invoice_uuid')) {
                $table->foreignUuid('invoice_uuid')->after('sn')->constrained('invoices', 'invoice_uuid')->onDelete('cascade');
            }

            // Reorder existing columns
            $table->string('description')->nullable()->after('service_category_id')->change();
            $table->string('status')->default('draft')->after('qty')->change();

        });

        $this->command->info('Invoice Items Table Restuctured.');
    }

}
