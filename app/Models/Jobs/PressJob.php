<?php

namespace App\Models\Jobs;

use App\Models\Services\Service;
use App\Traits\ScopedActive;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PressJob extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pressJob) {
            $pressJob->job_id = generateDashedRandomNumber();
            $pressJob->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'jobs_press';
    protected $primaryKey = 'job_id';
    public $incrementing = false;

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'subscriber_id',
        'job_id',
        'service_id',
        'customer_id',
        'cost',
        'copies',
        'total',
        'notes',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
