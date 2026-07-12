<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

#[Signature('app:backfill-design-jobs')]
#[Description('Command description')]
class BackfillDesignJobs extends Command
{
    protected const  JOBTYPE = 'design';
    protected const SOURCETABLE = 'jobs_design';


    /**
     * Execute the console command.
     */
    public function handle()
    {

            $this->info('Backfilling {$ype} from {$table}...');

            $count = DB::table(self::SOURCETABLE)->count();
            $bar = $this->output->createProgressBar($count);

            DB::transaction(function () use ($bar) {

                DB::table(self::SOURCETABLE)
                    ->orderBy('sn')
                    ->chunk(1000, function ($rows) use ($bar) {

                        $now = now();

                        $insert = $rows->map(fn($row) => [

                            'subscriber_id' => $row->subscriber_id,
                            'job_uuid' => Str::uuid(),
                            'job_type' => self::JOBTYPE,

                            'customer_id' => $row->customer_id,
                            'job_id' => $row->job_id,
                            'service_id' => $row->service_id ?? null,

                            'unit_cost' => $row->unit_cost,
                            'qty' => $row->copies,
                            'sub_total' => $row->total ?? 0,


                            // Premiums and Discounts
                            // 'discount' => $row->discount,
                            // 'premium' => $row->premium,
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


                        DB::table('printforce_jobs')->insertOrIgnore($insert);

                        $bar->advance(count($rows));

                    });

                $bar->finish();
                $this->newLine();

            });





        $failedLargeFormat =DB::table(self::SOURCETABLE)
            ->whereNotIn('job_id', DB::table('printforce_jobs')->where('job_type', self::JOBTYPE)->pluck('job_id'))
            ->count();

        return self::SUCCESS;
    }

}
