<?php

namespace App\Models\Customers;

use Dom\Attr;
use Carbon\Carbon;
use App\Traits\ScopedActive;
use App\Models\Jobs\PressJob;
use Laravel\Scout\Searchable;
use App\Models\Jobs\DesignJob;
use App\Helpers\CustomerHelper;
use App\Models\Jobs\EmbroideryJob;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Customers\CustomerPayment;
use App\Models\Invoices\CustomerInvoices;
use Illuminate\Database\Query\JoinClause;
use App\Models\Customers\CustomerCategory;
use App\Helpers\CustomerHelpers\CustomersHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
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



    /**
     * Returns the total of all large format jobs for the customer.
     *
     * @return Attribute
     */
    public function largeFormatJobSum() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->largeFormatJobs->sum('total') ?? 0.00
        );
    }


    /**
     * Returns the count of large format jobs for the customer.
     *
     * @return int
     */
    public function countLargeFormatJobs() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->largeFormatJobs->count() ?? 0
        );
    }


    /**
     * Returns the count of embroidery jobs for the customer.
     *
     * @return int
     */
    public function countEmbroideryJobs() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->embroideryJobs->count() ?? 0
        );
    }


    /**
     * Returns the total of all embroidery jobs for the customer.
     *
     * @return float
     */
    public function embroideryJobSum() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->embroideryJobs->sum('total') ?? 0.00
        );
    }


    /**
     * Returns the count of press jobs for the customer.
     *
     * @return int
     */
    public function countPressJobs() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->pressJobs->count() ?? 0
        );
    }


    /**
     * Returns the total of all press jobs for the customer.
     *
     * @return float
     */
    public function pressJobSum() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->pressJobs->sum('total') ?? 0.00
        );
    }


    /**
     * Returns the count of design jobs for the customer.
     *
     * @return int
     */
    public function countDesignJobs() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->designJobs->count()
        );
    }


    /**
     * Returns the total of all design jobs for the customer.
     *
     * @return float
     */
    public function designJobSum() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->designJobs->sum('total') ?? 0.00
        );
    }


    /**
     * Returns the count of photography jobs for the customer.
     *
     * @return int
     */
    public function photographyJobSum() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->photography_jobs->sum('total') ?? 0
        );
    }

    /**
     * Returns the count of photography jobs for the customer.
     *
     * @return int
     */
    public function countPhotographyJobs() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->photography_jobs->count() ?? 0
        );
    }

    public function jobCount() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->count_large_format_jobs + $this->count_embroidery_jobs + $this->count_press_jobs + $this->count_design_jobs + $this->count_photography_jobs
        );
    }


    public function countInvoices() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->getCountInvoices()
        );
    }

    public function invoiceSum() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->calculateTotalInvoice()
        );
    }


    public function customerDebit() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->largeFormatJobSum + $this->embroideryJobSum + $this->pressJobSum + $this->designJobSum + $this->photographyJobSum + $this->invoiceSum
        );
    }



    /**
     * Returns the total amount paid by the customer.
     *
     * @return float
     */
    public function customerCredit() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->payments->sum('amount_paid') ?? 0.00
        );
    }


    /**
     * Calculates the customer's balance by subtracting the total amount paid from the total amount owed.
     *
     * @return Attribute
     */
    public function customerBalance() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->customerDebit - $this->customerCredit
        );
    }


    /**
     * Calculates the total number of jobs for the customer.
     *
     * @return int
     */
    public function customerJobsCount() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->countLargeFormatJobs + $this->countEmbroideryJobs + $this->countPressJobs + $this->countDesignJobs + $this->photographyJobSum
        );
    }


    /**
     * Calculates the total balance of all customers.
     *
     * @return float
     */
    public function totalCustomerBalance() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->totalCustomerDebit() - $this->totalCustomerCredit()
        );
    }


    public function customerCategoryDescription() : Attribute
    {
        return Attribute::make(
            get: fn() => $this->customerCategory?->category_name ?? 'No Category Assigned'
        );
    }


    /**
     * Relationships -------------------------------------------------------------------
     */


    public function customerCategory(): BelongsTo
    {
        return $this->belongsTo(CustomerCategory::class, 'category', 'category_id');
    }


    /**
     * Defines a one-to-one relationship with the LargeFormat model.
     *
     * @return HasMany<LargeFormatJob, Customer>
     */
    public function largeFormatJobs(): HasMany
    {
        return $this->hasMany(LargeFormatJob::class, 'customer_id')
            ->with('service');
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
     * @return HasMany<CustomerInvoice, Customer>
     */
    public function invoices()
    {
        return $this->hasMany(CustomerInvoice::class, 'customer_id')
            ->where('status', 'active');
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


    public function getCountInvoices()
    {
        return $this->invoices()->count();
    }


    private function calculateTotalInvoice()
    {
        return $this->invoices->sum(function ($invoice) {
            return $invoice->sub_total;
        });
    }

}
