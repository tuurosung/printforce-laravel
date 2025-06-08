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
}
