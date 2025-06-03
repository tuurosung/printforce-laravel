<?php


namespace App\Helpers\JobHelpers;

use App\Models\Jobs\EmbroideryJob;
use App\Http\Controllers\Jobs\JobController;

class EmbroideryJobHelpers
{

    static function getTodaysJobs()
    {
        return EmbroideryJob::with('customer', 'service')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get();
    }



    static function performanceSummary()
    {
        // embroidery jobs summary grouped by services
        $performanceSummary = EmbroideryJob::with('service')->selectRaw('service_id, SUM(total) as jobs_sum, COUNT(job_id) as jobs_count')
            ->whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->groupBy('service_id')
            ->orderBy('jobs_sum', 'desc')
            ->get();

        return $performanceSummary;
    }


    static function monthyRevenueContribution()
    {

        // calculate the total revenue for the month
        $totalRevenue = JobController::sumOfAllJobsThisMonth();

        if ($totalRevenue == 0) {
            return 0; // Avoid division by zero
        }

        // sum of embroidery jobs
        $sumEmbroideryJobsThisMonth = EmbroideryJob::sumEmbroideryJobsThisMonth();

        // calculate this months revenue contribution as a percentage
        $thisMonthsRevenueContribution = ($sumEmbroideryJobsThisMonth / $totalRevenue) * 100;

        return $thisMonthsRevenueContribution;
    }
}
