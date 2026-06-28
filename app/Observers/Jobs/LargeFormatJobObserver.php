<?php

namespace App\Observers\Jobs;

use App\Domain\PrintJobs\Models\LargeFormatJob;

class LargeFormatJobObserver
{

    public function creating(LargeFormatJob $largeFormatJob): void
    {
        $largeFormatJob->job_id = generateDashedRandomNumber();
        $largeFormatJob->subscriber_id = auth()->user()->subscriber_id;
    }


    /**
     * Handle the LargeFormatJob "created" event.
     */
    public function created(LargeFormatJob $largeFormatJob): void
    {
        //
    }

    /**
     * Handle the LargeFormatJob "updated" event.
     */
    public function updated(LargeFormatJob $largeFormatJob): void
    {
        //
    }

    /**
     * Handle the LargeFormatJob "deleted" event.
     */
    public function deleted(LargeFormatJob $largeFormatJob): void
    {
        //
    }

    /**
     * Handle the LargeFormatJob "restored" event.
     */
    public function restored(LargeFormatJob $largeFormatJob): void
    {
        //
    }

    /**
     * Handle the LargeFormatJob "force deleted" event.
     */
    public function forceDeleted(LargeFormatJob $largeFormatJob): void
    {
        //
    }
}
