<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LargeFormatJob extends Model
{
    use HasFactory;

    protected $table = 'jobs_largeformat';
    protected $primaryKey = 'job_id';

    public function customer()
    {
        $this->belongsTo(Customer::class, 'customer_id', 'subscriber_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


}
