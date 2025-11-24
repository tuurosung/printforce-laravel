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
    ){}


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
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();

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

                COUNT(CASE WHEN DATE(date) = CURDATE() THEN 1 ELSE NULL END) as todays_job_count,
                SUM(CASE WHEN DATE(date) = CURDATE() THEN total ELSE 0 END) as todays_jobs_total,

                COUNT(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN 1 ELSE NULL END) as this_months_job_count,
                SUM(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN total ELSE 0 END) as this_months_jobs_total,

                COUNT(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN 1 ELSE NULL END) as this_years_job_count,
                SUM(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN total ELSE 0 END) as this_years_jobs_total,

                COUNT(*) as all_time_job_count,
                SUM(total) as all_time_jobs_total
            ')->first();

        return [
            'todays_job_count' => $statistics->todays_job_count ?? 0,
            'todays_jobs_total' => $statistics->todays_jobs_total ?? 0,

            'this_months_job_count' => $statistics->this_months_job_count ?? 0,
            'this_months_jobs_total' => $statistics->this_months_jobs_total ?? 0,

            'this_years_job_count' => $statistics->this_years_job_count ?? 0,
            'this_years_jobs_total' => $statistics->this_years_jobs_total ?? 0,

            'all_time_job_count' => $statistics->all_time_job_count ?? 0,
            'all_time_jobs_total' => $statistics->all_time_jobs_total ?? 0,
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
        $jobService = new CustomerJobService();
        // calculate the total revenue for the month
        $totalRevenue = $jobService->sumMonthlyJobs();

        if ($totalRevenue == 0) {
            return 0; // Avoid division by zero
        }

        // sum of embroidery jobs
        $sumEmbroideryJobsThisMonth = EmbroideryJob::sumEmbroideryJobsThisMonth();

        // calculate this months revenue contribution as a percentage
        $thisMonthsRevenueContribution = ($sumEmbroideryJobsThisMonth / $totalRevenue) * 100;

        return $thisMonthsRevenueContribution;
    }


    public function getTodaysJobCount()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['todays_job_count'] ?? 0;
    }

    public function getTodaysJobsTotal()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['todays_jobs_total'] ?? 0;
    }


    public function getThisMonthsJobCount()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['this_months_job_count'] ?? 0;
    }


    public function getThisMonthsJobsTotal()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['this_months_jobs_total'] ?? 0;
    }


    public function getThisYearsJobCount()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['this_years_job_count'] ?? 0;
    }

    public function getThisYearsJobsTotal()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['this_years_jobs_total'] ?? 0;
    }
    public function getAllTimeJobCount()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['all_time_job_count'] ?? 0;
    }

    public function getAllTimeJobsTotal()
    {
        $statistics = $this->getEmbroideryJobStatistics();
        return $statistics['all_time_jobs_total'] ?? 0;
    }
}
