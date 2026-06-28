<?php

namespace App\Observers\Jobs;

use App\Models\Jobs\DesignJob;

class DesignJobObserver
{

    public function creating(DesignJob $designJob): void
    {

    }

    /**
     * Handle the DesignJob "created" event.
     */
    public function created(DesignJob $designJob): void
    {
        $designJob->job_id = generateDashedRandomNumber();
        $designJob->subscriber_id = auth()->user()->subscriber_id;
    }

    /**
     * Handle the DesignJob "updated" event.
     */
    public function updated(DesignJob $designJob): void
    {
        //
    }

    /**
     * Handle the DesignJob "deleted" event.
     */
    public function deleted(DesignJob $designJob): void
    {
        //
    }

    /**
     * Handle the DesignJob "restored" event.
     */
    public function restored(DesignJob $designJob): void
    {
        //
    }

    /**
     * Handle the DesignJob "force deleted" event.
     */
    public function forceDeleted(DesignJob $designJob): void
    {
        //
    }
}
