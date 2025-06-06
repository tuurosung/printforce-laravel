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
}
