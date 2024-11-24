<?php

namespace App\Models\Jobs;

use App\Models\Service;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
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
        return $this->belongsTo(Service::class, 'service_id');
    }
}
