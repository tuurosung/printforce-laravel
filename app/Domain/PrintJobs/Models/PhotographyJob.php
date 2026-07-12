<?php

namespace App\Domain\PrintJobs\Models;

use App\Domain\PrintServices\Models\PrintService;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

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


    /**
     * Get the job details as an array.
     *
     * @return Attribute
     */
    public function details(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->buildDetails(),
        );
    }


    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }

    public function buildDetails()
    {
        return "{$this->copies} pcs";
    }
}
