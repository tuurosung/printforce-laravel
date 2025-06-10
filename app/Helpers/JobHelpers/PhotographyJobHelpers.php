<?php

namespace App\Helpers\JobHelpers;

use App\Models\Jobs\PhotographyJob;


class PhotographyJobHelpers {

    static function getTodaysJobs()
    {
        return PhotographyJob::with('customer', 'service')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get();
    }
}
