<?php

namespace App\Models;

use App\Models\EmbroideryJob;
use App\Models\LargeFormatJob;
use App\Models\CustomerPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    public $incrementing = false;

    public function customerCategory(): BelongsTo
    {
        return $this->belongsTo(CustomerCategory::class, 'category');
    }

    public function largeFormatJobs(): HasMany
    {
        return $this->hasMany(LargeFormatJob::class, 'customer_id');
    }

    public function largeFormatDebit()
    {
        return $this->largeFormatJobs()->where('status','active')->sum('total');

        // return $this->largeFormatJobs->map(function($i){
        //     return $i->total;
        // })->sum();
    }

    public function embroideryJobs(): HasMany
    {
        return $this->hasMany(EmbroideryJob::class, 'customer_id');
    }

    public function embroideryDebit()
    {
        return $this->embroideryJobs()->where('status','active')->sum('total');
    }

    public function customerDebit()
    {
        return $this->largeFormatDebit() + $this->embroideryDebit();
        // return collect(
        //     $this->largeFormatDebit(),
        //     $this->embroideryDebit()
        // )->sum();
    }

    public function myPayments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id')->where('subscriber_id', '187635294');
    }

    public function customerCredit()
    {
        return $this->myPayments()->sum('amount_paid');
    }

    public function customerBalance()
    {
        return $this->customerDebit() - $this->customerCredit();
    }

    public function customerJobsCount()
    {
        return collect([
            $this->largeFormatJobs->count(),
            $this->embroideryJobs->count()
        ])->sum();

    }

    static function totalCustomerDebit()
    {
        return collect([LargeFormatJob::sum('total'), EmbroideryJob::sum('total')])->sum();
    }

    static function totalCustomerCredit()
    {
        return collect([CustomerPayment::sum('amount_paid')])->sum();
    }

    static function totalCustomerBalance()
    {
        return Customer::totalCustomerDebit() - Customer::totalCustomerCredit();
    }


}
