<?php

namespace App\Domain\PrintJobs\Models;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Models\PrintService;
use App\Models\Scopes\SubscriberScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([SubscriberScope::class])]
class PrintforceJob extends Model
{
    protected $table = 'printforce_jobs';


    protected function casts(): array
    {
        return [
            'created_at'=> 'datetime'
        ];
    }



    public function viewRoute(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->buildViewRoute(),
        );
    }


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id', 'service_id');

    }


    private function buildViewRoute()
    {
        return match($this->job_type) {
            'Large Format' => route('jobs.largeformat.show', $this->job_id),
            'Embroidery' => route('jobs.embroidery.show', $this->job_id),
            'Design' => route('jobs.design.show', $this->job_id),
            'Press' => route('jobs.press.show', $this->job_id),
            'Photography' => '#',
        };
    }
}
