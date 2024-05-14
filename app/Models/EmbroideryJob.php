<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmbroideryJob extends Model
{
    use HasFactory;

    protected $table = 'jobs_embroidery';
    protected $primaryKey = ['subscriber_id', 'job_id'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'subscriber_id');
    }

}
