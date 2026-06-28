<?php

namespace App\Observers\Jobs;

use App\Domain\PrintJobs\Models\PressJob;

class PressJobObserver
{

    public function creating(PressJob $pressJob): void
    {
        $pressJob->job_id = generateDashedRandomNumber();
        $pressJob->subscriber_id = auth()->user()->subscriber_id;
    }

    /**
     * Handle the PressJob "created" event.
     */
    public function created(PressJob $pressJob): void
    {
        //
    }

    /**
     * Handle the PressJob "updated" event.
     */
    public function updated(PressJob $pressJob): void
    {
        //
    }

    /**
     * Handle the PressJob "deleted" event.
     */
    public function deleted(PressJob $pressJob): void
    {
        //
    }

    /**
     * Handle the PressJob "restored" event.
     */
    public function restored(PressJob $pressJob): void
    {
        //
    }

    /**
     * Handle the PressJob "force deleted" event.
     */
    public function forceDeleted(PressJob $pressJob): void
    {
        //
    }
}
