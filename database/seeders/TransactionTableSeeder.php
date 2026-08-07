<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (! Schema::hasTable('transactions')) {

            Schema::create('transactions', function (Blueprint $table): void {

                $table->uuid('id')->primary();
                $table->uuid('reference')->unique(); // business reference returned by post()

                $table->foreignUuid('account_id')
                    ->constrained('all_accounts', 'account_id')
                    ->cascadeOnDelete();

                $table->string('direction');                 // MovementDirection: inflow | outflow
                $table->unsignedBigInteger('amount'); // always positive
                $table->string('type');                      // MovementType

                // Polymorphic link back to the originating record (Payment, Expenditure...).
                // UUID morphs, nullable for sourceless adjustments.
                $table->nullableUuidMorphs('source');        // source_type + source_id

                $table->uuid('reverses_id')->nullable();
                $table->foreign('reverses_id')
                    ->references('id')->on('transactions')
                    ->nullOnDelete();

                $table->date('value_date');
                $table->foreignUuid('posted_by');            // acting user

                $table->string('idempotency_hash')->unique(); // the real concurrency guarantee
                $table->string('integrity_hash');             // HasChecksum

                $table->timestamps();

                // Powers sumInflows / sumOutflows.
                $table->index(['account_id', 'direction']);
            });

        };

    }
}
