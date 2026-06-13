<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:create-jobs-view')]
#[Description('Command description')]
class CreateJobsView extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating Jobs View...');

        DB::statement($this->viewSQL());

        $this->info('Jobs View created successfully.');
        return self::SUCCESS;
    }


    private function viewSQL(): string
    {
        return <<<'SQL'

            CREATE OR REPLACE VIEW jobs_view AS

            SELECT
                subscriber_id,
                job_id,
                customer_id,
                service_id,
                cost as unit_cost,
                CONCAT(width, ' x ', height, ' ', measuring_unit) as details,
                copies as qty,
                total,
                created_at,
                'Large Format' as job_type
            FROM jobs_largeformat

            UNION ALL

            SELECT
                subscriber_id,
                job_id,
                customer_id,
                service_id,
                unit_cost as unit_cost,
                'Non Dimensional'  as details,
                qty as qty,
                total,
                created_at,
                'Embroidery' as job_type
            FROM jobs_embroidery

            UNION ALL

            SELECT
                subscriber_id,
                job_id,
                customer_id,
                service_id,
                unit_cost as unit_cost,
                'Non Dimensional'  as details,
                copies as qty,
                total,
                created_at,
                'Design' as job_type
            FROM jobs_design

            UNION ALL

            SELECT
                subscriber_id,
                job_id,
                customer_id,
                service_id,
                cost as unit_cost,
                'Non Dimensional'  as details,
                copies as qty,
                total,
                created_at,
                'Press' as job_type
            FROM jobs_press

            UNION ALL

            SELECT
                subscriber_id,
                job_id,
                customer_id,
                service_id,
                unit_cost as unit_cost,
                'Non Dimensional'  as details,
                copies as qty,
                total,
                created_at,
                'Photography' as job_type
            FROM jobs_photography

            ORDER BY created_at DESC
        SQL;
    }
}
