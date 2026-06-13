<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

#[Signature('app:create-printforce-jobs-table')]
#[Description('Command description')]
class CreatePrintforceJobsTable extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {

        if (Schema::hasTable('printforce_jobs')) {

            $question = $this->ask('The printforce_jobs table already exists. Do you want to drop it?');
            $this->warn('Dropping printforce_jobs table...');

            if ($question === 'yes') {
                $this->info("Dropping Existing printforce_jobs table...");
                Schema::dropIfExists('printforce_jobs');
            }
        }

        $this->info('Creating printforce_jobs table...');

        Schema::create('printforce_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('subscriber_id');
            $table->uuid('job_uuid')->unique();
            $table->string('job_type');

            $table->string('customer_id')->nullable();
            $table->string('job_id');
            $table->string('service_id')->nullable();

            $table->decimal('unit_cost', 10, 2)->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();

            // Dimensions
            $table->decimal('width', 10, 2)->nullable();
            $table->decimal('height', 10, 2)->nullable();
            $table->string('measuring_unit')->nullable();

            // Embroidery
            $table->boolean('mat_supply')->default(false);
            $table->decimal('mat_unit_cost', 10, 2)->nullable();
            $table->decimal('mat_total_cost', 10, 2)->nullable();
            $table->decimal('purchase_cost', 10, 2)->nullable();

            // Premiums and Discount
            $table->decimal('premium', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();

            // Totals
            $table->decimal('total', 10, 2)->nullable();

            // Assignment And Completions
            $table->string('job_status')->default('pending');
            $table->string('job_assigned_to')->nullable();
            $table->timestamp('job_assigned_at')->nullable();
            $table->timestamp('job_completed_at')->nullable();
            $table->string('job_completed_by')->nullable();

            $table->date('date')->nullable();
            $table->text('notes')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->unique(['job_id', 'job_type', 'subscriber_id'], 'job_id_idempotency_key');
            $table->unique(['customer_id', 'job_id', 'subscriber_id'], 'customer_idempotency_key');
            $table->index('job_type');
            $table->index(['subscriber_id', 'created_at']);
            $table->index('job_status');
        });


        // Run Backfill Commands
        $this->call('app:backfill-photography-jobs');
        $this->call('app:backfill-design-jobs');
        $this->call('app:backfill-largeformat-jobs');
        $this->call('app:backfill-press-jobs');
        $this->call('app:backfill-embroidery-jobs');
    }
}
