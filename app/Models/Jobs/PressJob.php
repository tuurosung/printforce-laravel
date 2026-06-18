<?php

namespace App\Models\Jobs;

use App\Domain\PrintServices\Models\PrintService;
use App\Models\Customers\Customer;
use App\Models\Scopes\SubscriberScope;
use App\Models\User;
use App\Traits\ScopedActive;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'job_id', 'service_id', 'customer_id', 'cost', 'copies', 'total', 'notes', 'date'])]
class PressJob extends Model
{
    use HasFactory;
    use ScopedActive;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pressJob) {
            $pressJob->job_id = generateDashedRandomNumber();
            $pressJob->subscriber_id = session()->get('active_subscriber');
        });

    }

    protected $table = 'jobs_press';
    protected $primaryKey = 'job_id';
    public $incrementing = false;

    protected function casts(): array
    {
        return [
            'id'=> 'string',
        ];
    }


    public function details(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->buildDetails(),
        );
    }


    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id');
    }


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_assigned_to', 'user_id');
    }


    public function buildDetails()
    {
        return sprintf(
            '%s - %s - %s',
            $this->service?->service_name,
            $this->copies,
            $this->total
        );
    }
}
