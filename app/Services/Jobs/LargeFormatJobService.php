<?php

namespace App\Services\Jobs;

use Carbon\Carbon;
use App\Models\Jobs\LargeFormatJob;
use App\Http\Controllers\Jobs\JobController;

class LargeFormatJobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $largeFormatJob = new LargeFormatJob()
    ){}



    /**
     * Returns the latest 100 large format jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestLargeFormatJobs()
    {
        return $this->largeFormatJob->with('customer', 'service')
            ->latest('date')->take(100)->get();
    }


    /**
     * Returns today's large format jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTodaysJobs()
    {
        return $this->largeFormatJob->with('customer', 'service')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get();
    }



    /**
     * Returns large format jobs filtered by date range.
     *
     * @param string $start_date
     * @param string $end_date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLargeFormatJobsByDateRange(string $start_date, string $end_date)
    {
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();

        return $this->largeFormatJob->with('customer', 'service')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->latest()->get();
    }



    /**
     * Returns the statistics for large format jobs.
     *
     * @return array
     */
    public function getLargeFormatJobStatistics()
    {
        $statistics = $this->largeFormatJob->query()
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
     * Returns the performance summary for large format jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     * @throws \Exception
     */
    public function performanceSummary()
    {
        // largeFormat jobs summary grouped by services
        $performanceSummary = LargeFormatJob::with('service')->selectRaw('service_id, SUM(total) as jobs_sum, COUNT(job_id) as jobs_count')
            ->whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->groupBy('service_id')
            ->orderBy('jobs_sum', 'desc')
            ->get();

        return $performanceSummary;
    }



    public function monthlyRevenueContribution()
    {
        // calculate revenue contribution for the month
        $totalRevenue = JobController::sumOfAllJobsThisMonth();

        if ($totalRevenue == 0) {
            return 0; // Avoid division by zero
        }

        // sum of large format jobs
        $sumLargeFormatJobsThisMonth = LargeFormatJob::sumLargeFormatJobsThisMonth();

        // calculate this months revenue contribution as a percentage
        $thisMonthsRevenueContribution = ($sumLargeFormatJobsThisMonth / $totalRevenue) * 100;

        return $thisMonthsRevenueContribution;
    }


    public function getTodaysJobCount()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['todays_job_count'] ?? 0;
    }

    public function getTodaysJobsTotal()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['todays_jobs_total'] ?? 0;
    }


    public function getThisMonthsJobCount()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['this_months_job_count'] ?? 0;
    }

    /**
     * Returns the sum of all large format jobs for the current month.
     * @return float|int
     */
    public function getMonthlyJobTotal()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['this_months_jobs_total'] ?? 0;
    }

    public function getThisYearsJobCount()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['this_years_job_count'] ?? 0;
    }

    public function getThisYearsJobsTotal()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['this_years_jobs_total'] ?? 0;
    }

    public function getAllTimeJobCount()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['all_time_job_count'] ?? 0;
    }

    public function getAllTimeJobsTotal()
    {
        $statistics = $this->getLargeFormatJobStatistics();
        return $statistics['all_time_jobs_total'] ?? 0;
    }
}
