<?php

namespace App\Models\Jobs;


use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Services\PrintService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
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
        'date'
    ];

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

}
