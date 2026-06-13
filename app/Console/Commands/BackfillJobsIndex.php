<?php

namespace App\Console\Commands;

use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Models\Jobs\PressJob;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

#[Signature('app:backfill-jobs-index')]
#[Description('Command description')]
class BackfillJobsIndex extends Command
{
    protected array $sources = [
        'jobs_largeformat' => 'large_format',
        'jobs_embroidery' => 'embroidery',
        'jobs_press' => 'press',
        'jobs_design' => 'design',
        'jobs_photography' => 'photography',
    ];


    protected array $modelMap = [
        'large_format' => LargeFormatJob::class,
        'embroidery' => EmbroideryJob::class,
        'press' => PressJob::class,
        'design' => DesignJob::class,
        'photography' => PhotographyJob::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Verify idempotency key exists
        // $this->info('Verifying idempotency key...');
        // Schema::table('printforce_jobs', function (Blueprint $table) {

        //     if (!Schema::hasIndex('printforce_jobs', ['jobable_id', 'jobable_type'], 'unique')) {
        //         $table->unique(['jobable_id', 'jobable_type']);
        //     }

        // });


        foreach ($this->sources as $table => $type) {

            $this->info('Backfilling {$ype} from {$table}...');

            $count = DB::table($table)->count();
            $bar = $this->output->createProgressBar($count);

            DB::transaction(function () use ($table, $type, $bar) {

                DB::table($table)
                    ->orderBy('sn')
                    ->chunk(1000, function ($rows) use ($type, $bar) {

                        $now = now();

                        $insert = $rows->map(fn($row) => [

                            'subscriber_id' => $row->subscriber_id,
                            'job_uuid' => Str::uuid(),
                            'job_type' => $type,

                            'customer_id' => $row->customer_id,
                            'job_id' => $row->job_id,
                            'service_id' => $row->service_id ?? null,

                            'unit_cost' => $type == 'large_format' ? $row->cost : $row->unit_cost,
                            'qty' => $type == 'large_format' ? $row->copies : $row->qty,
                            'sub_total' => $row->sub_total ?? 0,

                            'width' => $row->width ?? null,
                            'height' => $row->height ?? null,
                            'measuring_unit' => $row->measuring_unit ?? null,

                            // Embroidery
                            'mat_supply' => $row->mat_supply ?? null,
                            'mat_unit_cost' => $row->mat_unit_cost ?? null,
                            'production_cost' => $type == 'embroidery' ? $row->production_cost : 0,

                            // Premiums and Discounts
                            'discount' => $row->discount,
                            'premium' => $row->premium,
                            'total' => $row->total,

                            'job_status' => $row->job_status,
                            'job_assigned_to' => $row->job_assigned_to,
                            'job_assigned_at' => $row->job_assigned_at,
                            'job_completed_at' => $row->job_completed_at,
                            'job_completed_by' => $row->job_completed_by,

                            'date' => $row->date,
                            'notes' => $row->notes,


                            'created_at' => $row->created_at,
                            'updated_at' => $row->updated_at,
                            'deleted_at' => $row->deleted_at ?? null,

                        ])->toArray();


                        DB::table('printforce_jobs')->insert($insert);

                        $bar->advance(count($rows));

                    });

                $bar->finish();
                $this->newLine();

            });

        }


        // Validations
        $failedEmbroidery =DB::table('jobs_embroidery')
            ->whereNotIn('job_id', DB::table('printforce_jobs')->where('job_type', 'embroidery')->pluck('jobable_id'))
            ->count();

        $failedLargeFormat =DB::table('jobs_largeformat')
            ->whereNotIn('job_id', DB::table('printforce_jobs')->where('job_type', 'largeformat')->pluck('jobable_id'))
            ->count();

        $failedDesign =DB::table('jobs_design')
            ->whereNotIn('job_id', DB::table('printforce_jobs')->where('job_type', 'design')->pluck('jobable_id'))
            ->count();

        $failedPress =DB::table('jobs_press')
            ->whereNotIn('job_id', DB::table('printforce_jobs')->where('job_type', 'press')->pluck('jobable_id'))
            ->count();

        $failedPhotography =DB::table('jobs_photography')
            ->whereNotIn('job_id', DB::table('printforce_jobs')->where('job_type', 'photography')->pluck('jobable_id'))
            ->count();

        $this->info('Failed embroidery: ' . $failedEmbroidery);
        $this->info('Failed largeformat: ' . $failedLargeFormat);
        $this->info('Failed design: ' . $failedDesign);
        $this->info('Failed press: ' . $failedPress);
        $this->info('Failed photography: ' . $failedPhotography);

        return self::SUCCESS;
    }

}
