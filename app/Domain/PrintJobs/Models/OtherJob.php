<?php

namespace App\Domain\PrintJobs\Models;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Models\PrintService;
use App\Observers\Jobs\OtherJobObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Resend\Service\Service;

#[ObservedBy([OtherJobObserver::class])]
#[Fillable(["id","subscriber_id", "customer_id", "job_id", "service_id", "cost", "qty", "total", "date", "job_assigned_by", "job_assigned_at", "job_completed_at", "job_completed_at"])]
class OtherJob extends Model
{
    protected $table = "jobs_other";


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class,'service_id');
    }
}
