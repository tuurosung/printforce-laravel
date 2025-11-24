<?php

namespace App\Models\Jobs;

use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Traits\ScopedToSubscriber;
use App\Models\Services\PrintService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class PhotographyJob extends Model
{
    use ScopedActive;
    use ScopedToSubscriber;

    protected $table = 'jobs_photography';
    protected $primaryKey = 'job_id';
    public $incrementing = false;


    #[Scope]
    public function pending(Builder $query): void
    {
        $query->where('job_status', 'pending');
    }


    #[Scope]
    public function completed(Builder $query): void
    {
        $query->where('job_status', 'completed');
    }



    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }
}
