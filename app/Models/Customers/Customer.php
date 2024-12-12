<?php

namespace App\Models\Customers;

use App\Traits\ScopedActive;
use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Helpers\CustomerHelper;
use App\Models\CustomerCategory;
use App\Models\Jobs\EmbroideryJob;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers\CustomerPayment;
use App\Models\Invoices\CustomerInvoices;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->subscriber_id = Auth::user()->subscriber_id;
            $customer->customer_id = generateRandomString();
        });
    }

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'subscriber_id',
        'customer_id',
        'name',
        'phone',
        'category'
    ];


    public function getCustomerCategoryDescriptionAttribute ()
    {
        return CustomerHelper::$customerCategory[$this->category];
    }


    public function largeFormatJobs(): HasMany
    {
        return $this->hasMany(LargeFormatJob::class, 'customer_id');
    }



    public function getLargeFormatJobSumAttribute () //largeFormatDebit()
    {
        return $this->largeFormatJobs->sum('total');
    }



    public function getCountLargeFormatJobsAttribute()
    {
        return $this->largeFormatJobs->count();
    }



    public function embroideryJobs(): HasMany
    {
        return $this->hasMany(EmbroideryJob::class, 'customer_id');
    }



    public function getCountEmbroideryJobsAttribute()
    {
        return $this->embroideryJobs->count();
    }



    public function getEmbroideryJobSumAttribute()
    {
        return $this->embroideryJobs->sum('total');
    }



    public function pressJobs(): HasMany
    {
        return $this->hasMany(PressJob::class, 'customer_id');
    }


    public function getCountPressJobsAttribute()
    {
        return $this->pressJobs->count();
    }



    public function getPressJobSumAttribute()
    {
        return $this->pressJobs->sum('total');
    }



    public function designJobs(): HasMany
    {
        return $this->hasMany(DesignJob::class, 'customer_id');
    }



    public function getCountDesignJobsAttribute()
    {
        return $this->designJobs->count();
    }



    public function getDesignJobSumAttribute()
    {
        return $this->designJobs->sum('total');
    }



    public function photography_jobs()
    {
        return $this->hasMany(PhotographyJob::class, 'customer_id');
    }



    public function getPhotographyJobSumAttribute()
    {
        return $this->photography_jobs->sum('total');
    }



    public function getJobCountAttribute()
    {
        return collect([
            $this->count_large_format_jobs,
            $this->count_embroidery_jobs,
            $this->count_press_jobs,
            $this->count_design_jobs,
            $this->count_photography_jobs
        ])->sum();
    }

    public function getCustomerDebitAttribute()
    {
        return collect([
            $this->largeFormatJobSum,
            $this->embroideryJobSum,
            $this->pressJobSum,
            $this->designJobSum,
            $this->photographyJobSum,
        ])->sum();
    }

    public function payments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }

    public function getCustomerCreditAttribute()
    {
        return $this->payments->sum('amount_paid');
    }

    public function getCustomerBalanceAttribute()
    {
        return $this->customer_debit - $this->customer_credit;
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
        return collect(
            [
                LargeFormatJob::sum('total'),
                EmbroideryJob::sum('total'),
                DesignJob::sum('total'),
                PressJob::sum('total'),
                PhotographyJob::sum('total')
            ]
        )->sum();
    }

    static function totalCustomerCredit()
    {
        return collect(
            [
                CustomerPayment::sum('amount_paid')
            ]
        )->sum();
    }

    static function totalCustomerBalance()
    {
        return Customer::totalCustomerDebit() - Customer::totalCustomerCredit();
    }


    public function invoices()
    {
        return $this->belongsTo(CustomerInvoices::class, 'customer_id');
    }

    /**
     * return list of all customers with debts
     * calculated as total customer debit - total customer credit
     *
     * @return mixed
     */
    public function debtorsList()
    {
        $debtors = Customer::withSum('largeFormatJobs as large_format_jobs_total', 'total')
        ->withSum('embroideryJobs as embroidery_jobs_total', 'total')
        ->withSum('designJobs as design_jobs_total', 'total')
        ->withSum('pressJobs as press_jobs_total', 'total')
        ->withSum('photography_jobs as photography_jobs_total', 'total')
        ->withSum('payments as payments_amount_paid', 'amount_paid')
        ->havingRaw('
            (COALESCE(large_format_jobs_total,0) +
            COALESCE(embroidery_jobs_total,0) +
            COALESCE(design_jobs_total,0) +
            COALESCE(press_jobs_total,0) +
            COALESCE(photography_jobs_total,0)
            ) - COALESCE(payments_amount_paid, 0) > 0
        ')
        ->orderBy('name')
        ->get();

        $debtors->map(function ($debtor) {
            $debtor->debit = $debtor->large_format_jobs_total + $debtor->embroidery_jobs_total + $debtor->design_jobs_total + $debtor->press_jobs_total + $debtor->photography_jobs_total;
            $debtor->credit = $debtor->payments_amount_paid;
            $debtor->balance = $debtor->debit - $debtor->credit;
        });

        return $debtors;

    }

}
