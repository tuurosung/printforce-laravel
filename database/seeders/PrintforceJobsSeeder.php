<?php

namespace Database\Seeders;

use App\DTOs\Jobs\PrintForceJobData;
use App\Enums\Jobs\JobTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PrintforceJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTypes = JobTypeEnum::cases();

        Schema::dropIfExists('printforce_jobs');

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
            $table->boolean('mat_supply')->nullable()->default(false);
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


        // DB::table("printforce_jobs")->truncate();

        DB::transaction(function () use ($jobTypes) {


            // normalize and de-duplicate
            foreach ($jobTypes as $type) {

                $duplicates = DB::table($type->jobTable())
                    ->select('subscriber_id', 'job_id')
                    ->selectRaw('COUNT(*)  AS occurances')
                    ->groupBy('subscriber_id', 'job_id')
                    ->havingRaw('COUNT(*) > 1')
                    ->orderBy('subscriber_id')
                    ->limit(100)
                    ->get();

                    foreach ($duplicates as $duplicate)
                    {
                        $rowIds = DB::table($type->jobTable())
                        ->where('subscriber_id', $duplicate->subscriber_id)
                        ->where('job_id', $duplicate->job_id)
                        ->orderBy('sn')
                        ->pluck('sn')
                        ->skip(1); // earliest row keeps the original job_id

                        foreach ($rowIds as $rowId) {
                            DB::table($type->jobTable())
                                ->where('sn', $rowId)
                                ->update(['job_id' => (string) Str::uuid()]);
                        }
                    }
            }

            foreach ($jobTypes as $type) {

                $table = $type->jobTable();
                $rowCount = DB::table($table)->where('status', 'active')->count();

                echo "Migrating {$rowCount} rows of {$type->value}" . PHP_EOL;

                // Placeholder-safe write batch: one placeholder per column per row,
                // MySQL caps prepared statements at 65,535.
                $columnCount = count(DB::getSchemaBuilder()->getColumnListing('printforce_jobs'));
                $insertBatch = (int) floor(60_000 / $columnCount);

                $migrated = 0;

                DB::table($table)
                    ->where('status', 'active')
                    ->lazyById(1_000, 'sn')
                    ->map(fn(object $row): array => PrintForceJobData::fromLegacyRow($row, $type)->toInsertRow())
                    ->chunk($insertBatch)
                    ->each(function ($batch) use (&$migrated, $rowCount, $type): void {
                        DB::table('printforce_jobs')->insertOrIgnore($batch->values()->all());

                        $migrated += $batch->count();
                        echo "  {$type->value}: {$migrated}/{$rowCount}" . PHP_EOL;
                    });

                // Verification: legacy rows with NO counterpart in the target.
                // Set-based anti-join — zero placeholders regardless of table size.
                $failed = DB::table("{$table} as legacy")
                    ->whereNotExists(function ($query) use ($type): void {
                        $query->select(DB::raw(1))
                            ->from('printforce_jobs')
                            ->whereColumn('printforce_jobs.job_id', 'legacy.job_id')
                            ->where('printforce_jobs.job_type', $type->value);
                    })
                    ->count();

                echo $failed > 0
                    ? "  WARNING: {$failed} rows of {$type->value} did not migrate" . PHP_EOL
                    : "  {$type->value} complete, all rows accounted for" . PHP_EOL;
            }

        });


    }

}
