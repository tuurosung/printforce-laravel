<?php

namespace App\Domain\PrintJobs\Models;


use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Models\PrintService;
use App\Enums\Jobs\JobStatusEnum;
use App\Models\Scopes\SubscriberScope;
use App\Models\User;
use App\Observers\Jobs\LargeFormatJobObserver;
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

#[ObservedBy([LargeFormatJobObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'customer_id', 'service_id', 'job_id', 'cost', 'discount', 'premium', 'width', 'height', 'copies', 'total', 'measuring_unit', 'notes', 'date', 'job_assigned_to', 'job_assigned_at', 'job_completed_at', 'job_completed_by'])]
class LargeFormatJob extends Model
{
    use HasFactory;
    use ScopedActive;


    protected $table = 'jobs_largeformat';
    protected $primaryKey = 'job_id';
    public $incrementing = false;


    protected function casts(): array
    {
        return [
            'job_status'=> JobStatusEnum::class
        ];
    }


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


    public function details(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->buildDetails(),
        );
    }


    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }


    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_assigned_to', 'user_id');
    }


    public static function sumLargeFormatJobsThisMonth()
    {
        return LargeFormatJob::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->sum('total');
    }


    public function buildDetails()
    {
        return "{$this->width} x {$this->height} {$this->measuring_unit} ({$this->copies} pcs)";
    }
}
