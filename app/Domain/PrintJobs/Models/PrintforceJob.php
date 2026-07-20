<?php

namespace App\Domain\PrintJobs\Models;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Models\PrintService;
use App\Enums\Jobs\JobStatusEnum;
use App\Models\Scopes\SubscriberScope;
use App\Models\User;
use App\Observers\Jobs\PrintforceJobObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([PrintforceJobObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'job_uuid', 'job_id', 'customer_id', 'service_id', 'job_type', 'unit_cost', 'qty', 'width', 'height', 'measuring_unit', 'mat_unit_cost',
           'purchase_cost', 'sub_total', 'premium', 'discount', 'total', 'job_assigned_to', 'job_assigned_at', 'job_completed_at', 'job_completed_by'])]
class PrintforceJob extends Model
{
    use SoftDeletes;

    protected $table = 'printforce_jobs';
    protected $primaryKey = 'job_uuid';
    protected $keyType = 'string';
    public $incrementing = false;


    protected function casts(): array
    {
        return [
            'job_status' => JobStatusEnum::class,
            'created_at'=> 'datetime',
        ];
    }


    public function referenceId(): Attribute
    {
        return Attribute::make(
            get: fn()=> $this->buildReference()
        );
    }

    public function details(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->service?->category_id?->buildDetails($this)
        );
    }


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id', 'service_id')
            ->withDefault([
                'service_name' => 'Undefined Service'
            ]);
    }


    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_assigned_to', 'user_id');
    }

    private function buildReference()
    {
        return str_pad($this->id, 7, '0', STR_PAD_LEFT);
    }

}
