<?php

namespace App\Models\Jobs;

use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Traits\ScopedToSubscriber;
use App\Models\Services\PrintService;
use Illuminate\Database\Eloquent\Model;

class PhotographyJob extends Model
{
    use ScopedActive;
    use ScopedToSubscriber;

    protected $table = 'jobs_photography';
    protected $primaryKey = 'job_id';
    public $incrementing = false;

    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id');
    }
}
