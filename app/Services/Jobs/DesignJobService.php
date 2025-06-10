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
    )
    {
    }


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
        $carbonNow = Carbon::now();

        $statistics = $this->designJob->query()
            ->selectRaw('
                SUM(CASE WHEN date = ? THEN total ELSE 0 END) as today_jobs,
                SUM(CASE WHEN date >= ? AND date <= ? THEN total ELSE 0 END) as this_months_jobs,
                SUM(CASE WHEN date >= ? AND date <= ? THEN total ELSE 0 END) as this_years_jobs
            ',[
                $carbonNow->format('Y-m-d'), // Today's date
                $carbonNow->startOfMonth()->format('Y-m-d'), $carbonNow->endOfMonth()->format('Y-m-d'), // Start and end of this month
                $carbonNow->startOfYear()->format('Y-m-d'), $carbonNow->endOfYear()->format('Y-m-d') // Start and end of this year
            ])->first();


        return [
            'todays_jobs' => $statistics->today_jobs ?? 0,
            'this_months_jobs' => $statistics->this_months_jobs ?? 0,
            'this_years_jobs' => $statistics->this_years_jobs ?? 0,
        ];
    }


    /**
     * Returns the sum of all design jobs for the current month
     * @return mixed
     */
    public function monthlyJobTotal()
    {
        $statistics = $this->getDesignJobStatistics();
        return $statistics['this_months_jobs'] ?? 0;
    }
}
