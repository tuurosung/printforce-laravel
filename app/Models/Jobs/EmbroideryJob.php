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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmbroideryJob extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($embroideryJob) {
            $embroideryJob->job_id = generateDashedRandomNumber();
            $embroideryJob->subscriber_id = Auth::user()->subscriber_id;
        });

        // self::tableInspector();
    }



    private static function tableInspector()
    {
        Schema::table('jobs_embroidery', function (Blueprint $table) {

            // check for timestamps
            if (!Schema::hasColumn('jobs_embroidery', 'created_at')) {
                $table->timestamps();
            }

            // make notes nullable
            if (!Schema::hasColumn('jobs_embroidery', 'notes')) {
                $table->string('notes')->nullable();
            } else {
                $table->string('notes')->nullable()->change();
            }

            // make timestamps nullable
            if (!Schema::hasColumn('jobs_embroidery', 'timestamp')) {
                $table->timestamp('timestamp')->nullable();
            } else {
                $table->timestamp('timestamp')->nullable()->change();
            }
        });
    }

    protected $table = 'jobs_embroidery';
    protected $primaryKey = 'job_id';
    public $incrementing = false;


    protected $fillable = [
        'subscriber_id',
        'customer_id',
        'job_id',
        'service_id',
        'unit_cost',
        'qty',
        'embroidery_cost',
        'mat_supply',
        'mat_unit_cost',
        'purchase_cost',
        'total',
        'notes'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }



    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }

}
