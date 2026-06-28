<?php

namespace App\Observers\Jobs;

use App\Domain\PrintJobs\Models\OtherJob;

class OtherJobObserver
{

    public function creating(OtherJob $job):void
    {
        $job->subscriber_id = auth()->user()->subscriber_id;
        $job->job_id = generateDashedRandomNumber();
    }


    /**
     * Handle the OtherJob "created" event.
     */
    public function created(OtherJob $otherJob): void
    {
        //
    }

    /**
     * Handle the OtherJob "updated" event.
     */
    public function updated(OtherJob $otherJob): void
    {
        //
    }

    /**
     * Handle the OtherJob "deleted" event.
     */
    public function deleted(OtherJob $otherJob): void
    {
        //
    }

    /**
     * Handle the OtherJob "restored" event.
     */
    public function restored(OtherJob $otherJob): void
    {
        //
    }

    /**
     * Handle the OtherJob "force deleted" event.
     */
    public function forceDeleted(OtherJob $otherJob): void
    {
        //
    }
}
