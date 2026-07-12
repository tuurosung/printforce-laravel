<?php

namespace App\Domain\PrintJobs\Models;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Models\PrintService;
use App\Models\Scopes\SubscriberScope;
use App\Models\User;
use App\Observers\Jobs\EmbroideryJobObserver;
use App\Traits\ScopedActive;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([EmbroideryJobObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'customer_id', 'job_id', 'service_id', 'unit_cost', 'qty', 'embroidery_cost', 'mat_supply', 'mat_unit_cost', 'purchase_cost',  'total', 'notes', 'date'])]
class EmbroideryJob extends Model
{
    use HasFactory;
    use ScopedActive;


    protected $table = 'jobs_embroidery';
    protected $primaryKey = 'job_id';
    public $incrementing = false;


    #[Scope]
    protected function pending(Builder $query): void
    {
        $query->where('job_status', 'pending');
    }


    #[Scope]
    protected function completed(Builder $query): void
    {
        $query->where('job_status', 'completed');
    }


    public function jobStatusDefinition(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getJobStatusDefinition()
        );
    }



    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id', 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }


    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_assigned_to', 'user_id')
            ->withDefault([
                'name' => 'Unassigned'
            ]);
    }


    /**
     * Get the total cost of the embroidery job.
     *
     * @return float
     */
    public static function sumEmbroideryJobsThisMonth()
    {
        return EmbroideryJob::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('total');
    }


    private function getJobStatusDefinition()
    {
       if (!$this->job_status) return null;

       $jobStatuses = config('printforce.jobs.job_statuses');

       if (!in_array($this->job_status, array_keys($jobStatuses))) {
           return 'Unknown Status';
       }

       return $jobStatuses[$this->job_status];
    }

}
