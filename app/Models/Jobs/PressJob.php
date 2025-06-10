<?php

namespace App\Models\Jobs;

use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Models\Services\PrintService;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
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
            $pressJob->subscriber_id = session()->get('active_subscriber');
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
        'date'
    ];


    /**
     * Relationships ------------------------------------------------------------
     */


    /**
     * Define the relationship with the Service model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Service, PressJob>
     */
    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id');
    }


    /**
     * Define the relationship with the Customer model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Customer, PressJob>
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
