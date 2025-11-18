<?php

namespace App\Models\Jobs;

use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Services\PrintService;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        // self::updateCreatedAt();
    }


    private static function updateCreatedAt()
    {
        DB::table('jobs_embroidery')
        ->whereYear('date', '2024')
            ->whereRaw('date <> created_at')
            ->limit(5000)
            ->update([
                'created_at' => DB::raw('date')
            ]);
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
        'notes',
        'date',
    ];

    /**
     * Attributes ----------------------------------------------------------------------
     */


    public function jobStatusDefinition(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getJobStatusDefinition()
        );
    }




     /**
      * Relationships ----------------------------------------------------------------------
      */


    /**
     * Defines the relationship between EmbroideryJob and Customer.
     *
     * @return BelongsTo<Customer, EmbroideryJob>
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    /**
     * Defines the relationship between EmbroideryJob and Service.
     *
     * @return BelongsTo<Service, EmbroideryJob>
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id', 'service_id');
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
