<?php

namespace App\Services\Jobs;

use App\Models\Jobs\EmbroideryJob;
use App\Http\Controllers\Jobs\JobController;

class EmbroideryJobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $embroideryJob = new EmbroideryJob()
    )
    {
    }

    /**
     * Returns an array of material purchase options for embroidery jobs.
     *
     * @return array<string, string>
     */
    public static function materialSupplyOptions(): array
    {
        return [
            'yes' => 'Company To Purchase',
            'no' => 'Customer To Purchase',
        ];
    }


    /**
     * Get recent 100 embroidery jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecentJobs()
    {
        return $this->embroideryJob->with('customer', 'service')
            ->latest('date')->limit(100)->get();
    }


    /**
     * Get today's embroidery jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTodaysJobs()
    {
        return $this->embroideryJob->with('customer', 'service')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get();
    }



    /**
     * Get the performance summary of embroidery jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function performanceSummary()
    {
        return $this->embroideryJob->with('service')
            ->selectRaw('service_id, SUM(total) as jobs_sum, COUNT(job_id) as jobs_count')
            ->whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->groupBy('service_id')
            ->orderBy('jobs_sum', 'desc')
            ->get();
    }

    /**
     * Calculate the monthly revenue contribution of embroidery jobs.
     *
     * @return float|int
     */
    public function monthyRevenueContribution()
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
