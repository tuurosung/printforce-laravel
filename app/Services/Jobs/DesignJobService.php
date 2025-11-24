<?php

namespace App\Services\Jobs;

use Carbon\Carbon;
use App\Models\Jobs\DesignJob;

class DesignJobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $designJob = new DesignJob()
    ){}


    /**
     * Returns the latest 100 design jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestDesignJobs()
    {
        return $this->designJob->with('customer', 'service')
            ->latest()->take(100)->get();
    }


    /**
     * Returns design jobs filtered by date range.
     *
     * @param string $start_date
     * @param string $end_date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDesignJobsByDateRange(string $start_date, string $end_date)
    {
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();

        return $this->designJob->with('customer', 'service')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->latest()->get();
    }


    /**
     * Returns today's design jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getTodaysJobs()
    {
        return DesignJob::with('customer', 'service')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get();
    }


    /**
     * Returns the statistics for design jobs.
     */
    public function getDesignJobStatistics()
    {

        $statistics = $this->designJob->query()
            ->selectRaw('
                COUNT(CASE WHEN DATE(date) = CURDATE() THEN 1 END) as todays_job_count,
                SUM(CASE WHEN DATE(date) = CURDATE() THEN total ELSE 0 END) as todays_jobs_total,

                COUNT(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN 1 END) as this_months_job_count,
                SUM(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN total ELSE 0 END) as this_months_jobs_total,

                COUNT(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN 1 END) as this_years_job_count,
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


    public function getTodaysJobsCount()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['todays_job_count'] ?? 0;
    }


    public function getTodaysJobsTotal()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['todays_jobs_total'] ?? 0;
    }


    public function monthlyJobCount()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['this_months_job_count'] ?? 0;
    }

    public function monthlyJobsTotal()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['this_months_jobs_total'] ?? 0;
    }

    public function yearlyJobCount()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['this_years_job_count'] ?? 0;
    }


    public function yearlyJobsTotal()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['this_years_jobs_total'] ?? 0;
    }

    public function allTimeJobCount()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['all_time_job_count'] ?? 0;
    }


    public function allTimeJobsTotal()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['all_time_jobs_total'] ?? 0;
    }
}
