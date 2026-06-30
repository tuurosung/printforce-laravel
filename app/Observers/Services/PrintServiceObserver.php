<?php

namespace App\Observers\Services;

use App\Domain\PrintServices\Models\PrintService;

class PrintServiceObserver
{

    public function creating(PrintService $printService): void
    {
        $printService->service_id = generateRandomString();
        $printService->subscriber_id = auth()->user()->subscriber_id;
    }

    /**
     * Handle the PrintService "created" event.
     */
    public function created(PrintService $printService): void
    {
        //
    }


    public function updating(PrintService $printService): void
    {
        $printService->subscriber_id = auth()->user()->subscriber_id;
    }


    /**
     * Handle the PrintService "updated" event.
     */
    public function updated(PrintService $printService): void
    {
        //
    }

    /**
     * Handle the PrintService "deleted" event.
     */
    public function deleted(PrintService $printService): void
    {
        //
    }

    /**
     * Handle the PrintService "restored" event.
     */
    public function restored(PrintService $printService): void
    {
        //
    }

    /**
     * Handle the PrintService "force deleted" event.
     */
    public function forceDeleted(PrintService $printService): void
    {
        //
    }
}
