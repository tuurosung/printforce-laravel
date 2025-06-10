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
     * Returns the sum of all press jobs for the current month.
     *
     * @return float
     */
    public function monthlyJobTotal()
    {
        $statistics = $this->getPressJobStatistics();
        return $statistics['this_months_jobs'] ?? 0;
    }
}
