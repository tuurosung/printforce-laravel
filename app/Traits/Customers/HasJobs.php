<?php

namespace App\Traits\Customers;

use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Customers\Customer;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasJobs
{

    /**
     * Relations ------------------------------------------------------------------------------------------
     */


    public function largeFormatJobs(): HasMany
    {
        return $this->hasMany(LargeFormatJob::class, 'customer_id')
            ->with('service');
    }


    public function embroideryJobs(): HasMany
    {
        return $this->hasMany(EmbroideryJob::class, 'customer_id');
    }


    public function pressJobs(): HasMany
    {
        return $this->hasMany(PressJob::class, 'customer_id');
    }


    public function designJobs(): HasMany
    {
        return $this->hasMany(DesignJob::class, 'customer_id');
    }


    public function photographyJobs(): HasMany
    {
        return $this->hasMany(PhotographyJob::class, 'customer_id');
    }


    /**
     * Helpers ------------------------------------------------------------------------------------------
     */


    protected function jobRelations()
    {
        return collect([
            $this->largeFormatJobs,
            $this->embroideryJobs,
            $this->pressJobs,
            $this->designJobs,
            $this->photographyJobs,
        ])->flatten();
    }


    public function getCustomerJobs()
    {
        return $this->jobRelations();
    }


    /**
     * Counts ----------------------------------------------------------------------------------------------
     */



    public function jobCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->jobRelations()->count()
        );
    }

    public function pendingJobCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->jobRelations()->where('job_status', 'pending')->count()
        );
    }

    public function completedJobCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->jobRelations()->where('job_status', 'completed')->count()
        );
    }

    public function jobsTotal(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->jobRelations()->sum('total')
        );
    }

}
