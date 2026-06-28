<?php

namespace App\Domain\PrintJobs\Models;

use App\Observers\Jobs\OtherJobObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([OtherJobObserver::class])]
#[Fillable(["id","subscriber_id", "customer_id", "job_id", "service_id", "cost", "qty", "total", "date", "job_assigned_by", "job_assigned_at", "job_completed_at", "job_completed_at"])]
class OtherJob extends Model
{
    protected $table = "jobs_other";
}
