<?php

namespace App\Models\Jobs;

use App\Models\Service;
use App\Traits\ScopedActive;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
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

        // self::tableInspector();
    }


    private static function tableInspector()
    {
        Schema::table('jobs_design', function (Blueprint $table) {

            // check for timestamps
            if (!Schema::hasColumn('jobs_design', 'created_at')) {
                $table->timestamps();
            }

            // make notes nullable
            if (!Schema::hasColumn('jobs_design', 'notes')) {
                $table->string('notes')->nullable();
            } else {
                $table->string('notes')->nullable()->change();
            }

        });
    }


    protected $table = 'jobs_design';

    protected $primaryKey = 'job_id';
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
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
