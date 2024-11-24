<?php

namespace App\Models\Jobs;

use App\Models\Service;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignJob extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected $table = 'jobs_design';

    protected $primaryKey = 'job_id';
    public $incrementing = false;

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
