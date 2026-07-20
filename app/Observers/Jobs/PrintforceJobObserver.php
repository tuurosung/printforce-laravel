<?php

namespace App\Observers\Jobs;

use App\Domain\PrintJobs\Models\PrintforceJob;
use Illuminate\Support\Str;

class PrintforceJobObserver
{
    public function creating(PrintforceJob $printforceJob)
    {
        $printforceJob->subscriber_id = auth()->user()->subscriber_id;
        $printforceJob->job_id = Str::uuid();
    }
}
