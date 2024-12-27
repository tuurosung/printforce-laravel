<?php

namespace App\Models\Jobs;


use App\Traits\ScopedActive;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
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

        // self::tableInspector();
    }

    private static function tableInspector()
    {
        Schema::table('jobs_largeformat', function (Blueprint $table) {

            // check for timestamps
            if (!Schema::hasColumn('jobs_largeformat', 'created_at')) {
                $table->timestamps();
            }

            // make notes nullable
            if (!Schema::hasColumn('jobs_largeformat', 'notes')) {
                $table->string('notes')->nullable();
            } else  {
                $table->string('notes')->nullable()->change();
            }
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
    ];

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }


}
