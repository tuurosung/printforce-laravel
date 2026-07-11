<?php

namespace Database\Seeders;

use App\DTOs\Jobs\PrintForceJobData;
use App\Enums\Jobs\JobTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        DB::table("printforce_jobs")->truncate();

        DB::transaction(function () use ($jobTypes) {

            foreach ($jobTypes as $type) {
                DB::table($type->jobTable())
                    ->orderBy("sn")
                    ->chunk(100, function ($rows) use ($type) {

                        $rowCount = DB::table($type->jobTable())->count();
                        echo "Migrating {$rowCount} rows of " . $type->value . PHP_EOL;

                        $insert = $rows
                            ->map(fn(object $row) => PrintForceJobData::fromLegacyRow($row, $type)->toInsertRow())
                            ->all();


                        DB::table('printforce_jobs')->insertOrIgnore($insert);
                    });

                $failed = DB::table($type->jobTable())
                    ->whereIn('job_id', DB::table('printforce_jobs')->where('job_type', $type->value)->pluck('job_id'))
                    ->count();

                echo $failed . "Jobs " . PHP_EOL;
            }

        });


    }

}
