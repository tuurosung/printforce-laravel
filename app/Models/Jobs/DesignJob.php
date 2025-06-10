<?php

namespace App\Models\Jobs;


use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Models\Services\PrintService;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignJob extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($designJob) {
            $designJob->job_id = generateDashedRandomNumber();
            $designJob->subscriber_id = Auth::user()->subscriber_id;
        });

    }



    protected $table = 'jobs_design';
    protected $primaryKey = 'job_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'subscriber_id',
        'customer_id',
        'job_id',
        'service_id',
        'unit_cost',
        'copies',
        'total',
        'notes',
        'date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id');
    }
}
