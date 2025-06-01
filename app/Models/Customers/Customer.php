<?php

namespace App\Models\Customers;

use Carbon\Carbon;
use App\Traits\ScopedActive;
use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Helpers\CustomerHelper;
use App\Helpers\CustomerHelpers\CustomersHelper;
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
use Illuminate\Database\Query\JoinClause;

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


    private static function updateCreatedAt()
    {
        DB::table('customers')
            ->whereRaw('date_registered <> DATE(created_at)')
            ->limit(1000)
            ->update([
                'created_at' => DB::raw("STR_TO_DATE(date_registered, '%Y-%m-%d %H:%i:%s')")
            ]);
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



    /**
     * Attributes -------------------------------------------------------------------
     */


    public function getLargeFormatJobSumAttribute() //largeFormatDebit()
    {
        return $this->largeFormatJobs->sum('total');
    }

    public function getCountLargeFormatJobsAttribute()
    {
        return $this->largeFormatJobs->count();
    }


    public function getCountEmbroideryJobsAttribute()
    {
        return $this->embroideryJobs->count();
    }


    public function getEmbroideryJobSumAttribute()
    {
        return $this->embroideryJobs->sum('total');
    }


    public function getCountPressJobsAttribute()
    {
        return $this->pressJobs->count();
    }


    public function getPressJobSumAttribute()
    {
        return $this->pressJobs->sum('total');
    }


    public function getCountDesignJobsAttribute()
    {
        return $this->designJobs->count();
    }


    public function getDesignJobSumAttribute()
    {
        return $this->designJobs->sum('total');
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


    static function totalCustomerBalance()
    {
        return Customer::totalCustomerDebit() - Customer::totalCustomerCredit();
    }


    public function getCustomerCategoryDescriptionAttribute()
    {
        return CustomerHelper::$customerCategory[$this->category];
    }


    /**
     * Relationships -------------------------------------------------------------------
     */



    /**
     * Defines a one-to-one relationship with the LargeFormat model.
     *
     * @return HasMany<LargeFormatJob, Customer>
     */
    public function largeFormatJobs(): HasMany
    {
        return $this->hasMany(LargeFormatJob::class, 'customer_id');
    }


    /**
     * Defines a has-many relationship with the EmbroideryJob model.
     *
     * @return HasMany<EmbroideryJob, Customer>
     */
    public function embroideryJobs(): HasMany
    {
        return $this->hasMany(EmbroideryJob::class, 'customer_id');
    }


    /**
     * Defines a has-many relationship with the PressJob model.
     *
     * @return HasMany<PressJob, Customer>
     */
    public function pressJobs(): HasMany
    {
        return $this->hasMany(PressJob::class, 'customer_id');
    }


    /**
     * Defines a has-many relationship with the DesignJob model.
     *
     * @return HasMany<DesignJob, Customer>
     */
    public function designJobs(): HasMany
    {
        return $this->hasMany(DesignJob::class, 'customer_id');
    }


    /**
     * Defines a has-many relationship with the PhotographyJob model.
     *
     * @return HasMany<PhotographyJob, Customer>
     */
    public function photography_jobs()
    {
        return $this->hasMany(PhotographyJob::class, 'customer_id');
    }

    /**
     * Defines a has-many relationship with the CustomerPayment model.
     *
     * @return HasMany<CustomerPayment, Customer>
     */
    public function payments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }


    /**
     * Defines a belongs-to relationship with the CustomerInvoices model.
     *
     * @return BelongsTo<CustomerInvoices, Customer>
     */
    public function invoices()
    {
        return $this->belongsTo(CustomerInvoices::class, 'customer_id');
    }



    // BEGIN STATIC FUNCTIONS


    // END STATIC FUNCTIONS

    /**
     * Methods ----------------------------------------------------------------------------
     */

    public function loadRelations()
    {
        return $this->load([
            'largeFormatJobs.service',
            'embroideryJobs.service',
            'pressJobs.service',
            'designJobs.service',
            'photography_jobs.service',
            'payments.account'
        ]);
    }


    public static function countNewCustomers()
    {
        return Customer::whereMonth('created_at', Carbon::now()->month)->count();
    }

    public static function countAllCustomers()
    {
        return Customer::count();
    }


    public static function customerRankingAnalytics()
    {

        return CustomersHelper::customerRanking();
    }

}
