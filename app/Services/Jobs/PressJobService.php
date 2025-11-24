<?php

namespace App\Services\Jobs;

use Carbon\Carbon;
use App\Models\Jobs\PressJob;

class PressJobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $pressJob = new PressJob()
    )
    {
    }



    /**
     * Returns the latest 100 press jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestPressJobs()
    {
        return $this->pressJob->with('customer', 'service')
            ->latest('date')->take(100)->get();
    }


    /**
     * Returns today's press jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTodaysPressJobs()
    {
        return $this->pressJob->with('customer', 'service')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->latest('date')->get();
    }


    /**
     * Returns press jobs filtered by date range.
     *
     * @param string $start_date
     * @param string $end_date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPressJobsByDateRange(string $start_date, string $end_date)
    {
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();

        return $this->pressJob->with('customer', 'service')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->latest('date')->get();
    }


    /**
     * Returns the statistics for press jobs.
     *
     * @return array
     */
    public function getPressJobStatistics()
    {
        $carbonNow = Carbon::now();

        $statistics = $this->pressJob->query()
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
            'all_time_jobs_total' => $statistics->all_time_jobs_total ?? 0
        ];
    }


    public function getTodaysJobsCount()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['todays_job_count'] ?? 0;
    }


    public function getTodaysJobsTotal()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['todays_jobs_total'] ?? 0;
    }


    public function getMonthlyJobCount()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['this_months_job_count'] ?? 0;
    }


    public function getMonthlyJobTotal()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['this_months_jobs_total'] ?? 0;
    }


    public function getYearlyJobCount()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['this_years_job_count'] ?? 0;
    }

    public function getYearlyJobTotal()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['this_years_jobs_total'] ?? 0;
    }

    public function getAllTimeJobCount()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['all_time_job_count'] ?? 0;
    }

    public function getAllTimeJobTotal()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['all_time_jobs_total'] ?? 0;
    }
}
