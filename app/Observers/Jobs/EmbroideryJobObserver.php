<?php

namespace App\Observers\Jobs;

use App\Domain\PrintJobs\Models\EmbroideryJob;
use Illuminate\Support\Facades\Auth;

class EmbroideryJobObserver
{

    public function creating(EmbroideryJob $embroideryJob): void
    {
        $embroideryJob->job_id = generateDashedRandomNumber();
        $embroideryJob->subscriber_id = auth()->user()->subscriber_id;
    }


    /**
     * Handle the EmbroideryJob "created" event.
     */
    public function created(EmbroideryJob $embroideryJob): void
    {
        //
    }

    /**
     * Handle the EmbroideryJob "updated" event.
     */
    public function updated(EmbroideryJob $embroideryJob): void
    {
        //
    }

    /**
     * Handle the EmbroideryJob "deleted" event.
     */
    public function deleted(EmbroideryJob $embroideryJob): void
    {
        //
    }

    /**
     * Handle the EmbroideryJob "restored" event.
     */
    public function restored(EmbroideryJob $embroideryJob): void
    {
        //
    }

    /**
     * Handle the EmbroideryJob "force deleted" event.
     */
    public function forceDeleted(EmbroideryJob $embroideryJob): void
    {
        //
    }
}
