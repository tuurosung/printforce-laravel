<?php

namespace App\Services\Jobs;

use Carbon\Carbon;
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
     * Get embroidery jobs filtered by date range.
     *
     * @param string $start_date
     * @param string $end_date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getEmbroideryJobsByDateRange(string $start_date, string $end_date)
    {
        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        return $this->embroideryJob->with('customer', 'service')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->latest()->get();
    }
    /**
     * Get the statistics for embroidery jobs.
     *
     * @return array
     */
    public function getEmbroideryJobStatistics(): array
    {
        $carbonNow = Carbon::now();


        $statistics = $this->embroideryJob->query()
            ->selectRaw('
                SUM(CASE WHEN date = ? THEN total ELSE 0 END) as today_jobs,
                SUM(CASE WHEN date >= ? AND date <= ? THEN total ELSE 0 END) as this_months_jobs,
                SUM(CASE WHEN date >= ? AND date <= ? THEN total ELSE 0 END) as this_years_jobs
            ', [
                $carbonNow->format('Y-m-d'), // Today's date
                $carbonNow->startOfMonth()->format('Y-m-d'), $carbonNow->endOfMonth()->format('Y-m-d'), // Start and end of this month
                $carbonNow->startOfYear()->format('Y-m-d'), $carbonNow->endOfYear()->format('Y-m-d') // Start and end of this year
            ])
            ->first();

        return [
            'todays_jobs' => $statistics->today_jobs ?? 0,
            'this_months_jobs' => $statistics->this_months_jobs ?? 0,
            'this_years_jobs' => $statistics->this_years_jobs ?? 0,
        ];
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
        $jobService = new JobService();
        // calculate the total revenue for the month
        $totalRevenue = $jobService->getMonthlyJobSum();

        if ($totalRevenue == 0) {
            return 0; // Avoid division by zero
        }

        // sum of embroidery jobs
        $sumEmbroideryJobsThisMonth = EmbroideryJob::sumEmbroideryJobsThisMonth();

        // calculate this months revenue contribution as a percentage
        $thisMonthsRevenueContribution = ($sumEmbroideryJobsThisMonth / $totalRevenue) * 100;

        return $thisMonthsRevenueContribution;
    }


    /**
     * Returns the sum of all embroidery jobs for the current month.
     *
     * @return float|int
     */
    public function monthlyJobTotal()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['this_months_jobs'] ?? 0;
    }
}
