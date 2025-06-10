<?php

namespace App\Services\Jobs;

class JobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $largeFormatJobService = new LargeFormatJobService(),
        private $embroideryJobService = new EmbroideryJobService(),
        private $designJobService = new DesignJobService(),
        private $pressJobService = new PressJobService()
    )
    {
        //
    }



    /**
     * Return the sum of all jobs for a given month
     */
    public function getMonthlyJobSum()
    {

        $largeFormatJobTotal = $this->largeFormatJobService->monthlyJobTotal();
        $embroideryJobTotal = $this->embroideryJobService->monthlyJobTotal();
        $designJobTotal = $this->designJobService->monthlyJobTotal();
        $pressJobTotal = $this->pressJobService->monthlyJobTotal();

        return collect([
            $largeFormatJobTotal,
            $embroideryJobTotal,
            $designJobTotal,
            $pressJobTotal,
        ])->sum();
    }
}
