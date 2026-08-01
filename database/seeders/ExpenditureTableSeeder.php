<?php

namespace Database\Seeders;

use App\Enums\PaymentMethodsEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExpenditureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::table('expenditure', function (Blueprint $table) {

            // Force subscriber_id to be required
            if (!Schema::hasColumn('expenditure', 'subscriber_id'))
            {
                $table->string('subscriber_id')->after('sn');
            } else {
                $table->string('subscriber_id', 64)->after('sn')->change();
            }


            // Add payment_method
            if (! Schema::hasColumn('expenditure', 'payment_method')) {
                $table->string('payment_method')->after('expenditure_id');
            }


            // rename header_id to source_account_id
            if (Schema::hasColumn('expenditure', 'header_id'))
            {
                $table->renameColumn('header_id', 'source_account_id');
            }

            // rename account_number to destination_account_id
            if (Schema::hasColumn('expenditure', 'account_number')) {
                $table->renameColumn('account_number', 'destination_account_id')->after('source_account_id');
            }

            if (Schema::hasColumn('expenditure', 'description')) {
                $table->renameColumn('description', 'narration');
            }

            // add reference column
            if (! Schema::hasColumn('expenditure', 'reference')) {
                $table->string('reference')->nullable();
            } else {
                $table->string('reference')->nullable()->after('date')->change();
            }

            // add drawee column
            if (! Schema::hasColumn('expenditure', 'drawee')) {
                $table->string('drawee')->nullable()->after('reference');
            }

            // add idempotency key column
            if (! Schema::hasColumn('expenditure', 'idempotency_key')) {
                $table->string('idempotency_key', 36)->nullable()->after('reference');
            }

            // enable soft deletes
            if (! Schema::hasColumn('expenditure', 'deleted_at')) {
                $table->softDeletes();
            }

            // drop timestamps column
            if (Schema::hasColumn('expenditure', 'timestamp')) {
                $table->dropColumn('timestamp');
            }

            if (Schema::hasColumn('expenditure', 'datetime')) {
                $table->dropColumn('datetime');
            }

            // drop datetime

            $table->decimal('amount', 10, 2)->change();

            $table->string('destination_account_id')->after('source_account_id')->change();
            $table->string('narration')->nullable()->after('amount')->change();

            // set deleted rows
            DB::table('expenditure')->where('status', 'deleted')
                ->update([
                    'deleted_at' => now()
                ]);


            DB::table('expenditure')->where('payment_method', '')
                ->update([
                    'payment_method' => PaymentMethodsEnum::CASH
                ]);

        });
    }
}
