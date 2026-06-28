<?php

namespace App\Domain\PrintJobs\Models;


use App\Domain\PrintServices\Models\PrintService;
use App\Models\Customers\Customer;
use App\Models\Scopes\SubscriberScope;
use App\Models\User;
use App\Traits\ScopedActive;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'customer_id', 'job_id', 'service_id', 'unit_cost', 'copies', 'total', 'notes', 'date'])]
class DesignJob extends Model
{
    use HasFactory;
    use ScopedActive;

    protected $table = 'jobs_design';
    protected $primaryKey = 'job_id';
    protected $keyType = 'string';
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


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_assigned_to', 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }
}
