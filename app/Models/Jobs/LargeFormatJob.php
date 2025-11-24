<?php

namespace App\Models\Jobs;


use App\Models\User;
use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Services\PrintService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LargeFormatJob extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($largeFormatJob) {
            $largeFormatJob->job_id = generateDashedRandomNumber();
            $largeFormatJob->subscriber_id = Auth::user()->subscriber_id;
        });

    }



    protected $table = 'jobs_largeformat';
    protected $primaryKey = 'job_id';
    public $incrementing = false;

    protected $fillable = [
        'subscriber_id',
        'customer_id',
        'service_id',
        'job_id',
        'cost',
        'discount',
        'premium',
        'width',
        'height',
        'copies',
        'total',
        'measuring_unit',
        'notes',
        'date',
        'job_assigned_to',
        'job_assigned_at',
        'job_completed_at',
        'job_completed_by',
    ];


    /**
     * Scopes ------------------------------------------------------------------------------------------
     */



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

    /**
     * Attributes -----------------------------------------------------------------------------------------
     */


    /**
     * Get the job details as an array.
     *
     * @return Attribute
     */
    public function details(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->buildDetails(),
        );
    }


    /**
     * Get the job status as a string.
     *
     * @return string The job status as a string.
     */
    public function jobStatusDefinition(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getJobStatusDescription(),
        );
    }



    /**
     * Relationships -----------------------------------------------------------------------------------
     */



    /**
     * The customer that owns the large format job.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    /**
     * The service associated with the large format job.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }


    /**
     * The user that the job is assigned to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_assigned_to', 'user_id');
    }





    // BEGIN STATIC FUNCTIONS

    public static function countLargeFormatJobs()
    {
        return LargeFormatJob::count();
    }

    public static function sumLargeFormatJobsThisYear()
    {
        return LargeFormatJob::whereYear('created_at', now()->format('Y'))
            ->sum('total');

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


    private function getJobStatusDescription(): string
    {

        if ($this->job_status == null || $this->job_status == '') {
            return 'Unknown';
        }

        if (!in_array($this->job_status, array_keys(config('printforce.jobs.job_statuses')))) {
            return 'Unknown';
        }

        return config('printforce.jobs.job_statuses')[$this->job_status];
    }

}
