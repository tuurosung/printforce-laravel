<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:create-job-stats-view')]
#[Description('Command description')]
class CreateJobStatsView extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }


    public function viewSql(): string
    {
        return <<<'SQL'

        CREATE OR REPLACE VIEW job_stats_view AS

        SELECT
            subscriber_id,
            SUM(
                CASE WHEN DATE THEN total ELSE 0 END
            )

        SQL;
    }
}
