<?php

namespace App\Models\Customers;

use Carbon\Carbon;
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


    // BEGIN RELATIONSHIPS


    // END RELATIONSHIPS




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

    // static function totalCustomerDebit()
    // {

    //     return collect(
    //         [
    //             LargeFormatJob::sum('total'),
    //             EmbroideryJob::sum('total'),
    //             DesignJob::sum('total'),
    //             PressJob::sum('total'),
    //             PhotographyJob::sum('total')
    //         ]
    //     )->sum();
    // }



    // static function totalCustomerCredit()
    // {
    //     return collect(
    //         [
    //             CustomerPayment::sum('amount_paid')
    //         ]
    //     )->sum();
    // }

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
      

        $largeFormatJobs = LargeFormatJob::select(['customer_id', DB::raw('SUM(total) as largeformat_jobs_total')])
            ->groupBy('customer_id');

        $embroideryJobs = EmbroideryJob::select(['customer_id', DB::raw('SUM(total) as embroidery_jobs_total')])
            ->groupBy('customer_id');

        $designJobs = DesignJob::select(['customer_id', DB::raw('SUM(total) as design_jobs_total')])
            ->groupBy('customer_id');

        $pressJobs = PressJob::select(['customer_id', DB::raw('SUM(total) as press_jobs_total')])
            ->groupBy('customer_id');

        $photographyJobs = PhotographyJob::select(['customer_id', DB::raw('SUM(total) as photography_jobs_total')])
            ->groupBy('customer_id');

        $customerPayments = CustomerPayment::select(['customer_id', DB::raw('SUM(amount_paid) as payments_amount_paid')])
            ->groupBy('customer_id');


        $debtors = Customer::select('customers.customer_id')->select('customers.name')
        ->selectRaw('

            COALESCE(large_format_jobs.largeformat_jobs_total,0) +
            COALESCE(embroidery_jobs.embroidery_jobs_total,0) +
            COALESCE(design_jobs.design_jobs_total,0)  +
            COALESCE(press_jobs.press_jobs_total,0) +
            COALESCE(photography_jobs.photography_jobs_total,0)

            as debit
        ')
        ->selectRaw('COALESCE(customer_payments.payments_amount_paid,0) as credit')
        ->leftJoinSub($largeFormatJobs, 'large_format_jobs', function (JoinClause $joinClause){
                $joinClause->on('customers.customer_id', '=', 'large_format_jobs.customer_id');
        })
        ->leftJoinSub($embroideryJobs, 'embroidery_jobs', function (JoinClause $joinClause){
                $joinClause->on('customers.customer_id', '=', 'embroidery_jobs.customer_id');
        })
        ->leftJoinSub($designJobs, 'design_jobs', function (JoinClause $joinClause){
                $joinClause->on('customers.customer_id', '=', 'design_jobs.customer_id');
        })
        ->leftJoinSub($pressJobs, 'press_jobs', function (JoinClause $joinClause){
                $joinClause->on('customers.customer_id', '=', 'press_jobs.customer_id');
        })
        ->leftJoinSub($photographyJobs, 'photography_jobs', function (JoinClause $joinClause){
                $joinClause->on('customers.customer_id', '=', 'photography_jobs.customer_id');
        })
        ->leftJoinSub($customerPayments, 'customer_payments', function (JoinClause $joinClause){
                $joinClause->on('customers.customer_id', '=', 'customer_payments.customer_id');
        })
        ->where('customers.status', 'active')
        ->havingRaw('debit > credit')
        ->get();


            // dd($debtors);

            return $debtors;

    }


    // BEGIN STATIC FUNCTIONS

    public static function countNewCustomers()
    {
        return Customer::whereMonth('created_at', Carbon::now()->month)->count();
    }


    public static function customerRankingAnalytics()
    {

        $largeFormatJobs = LargeFormatJob::select(['customer_id', DB::raw('COUNT(job_id) as count_largeformat_jobs')])
            ->groupBy('customer_id');

        $embroideryJobs = EmbroideryJob::select(['customer_id', DB::raw('COUNT(job_id) as count_embroidery_jobs')])
            ->groupBy('customer_id');

        $designJobs = DesignJob::select(['customer_id', DB::raw('COUNT(job_id) as count_design_jobs')])
            ->groupBy('customer_id');

        $pressJobs = PressJob::select(['customer_id', DB::raw('COUNT(job_id) as count_press_jobs')])
            ->groupBy('customer_id');

        $photographyJobs = PhotographyJob::select(['customer_id', DB::raw('COUNT(job_id) as count_photography_jobs')])
            ->groupBy('customer_id');


        $customerRanking = Customer::select('customers.customer_id')->select('customers.name')
        ->selectRaw('
            COALESCE(large_format_jobs.count_largeformat_jobs,0) +
            COALESCE(embroidery_jobs.count_embroidery_jobs,0) +
            COALESCE(design_jobs.count_design_jobs,0)  +
            COALESCE(press_jobs.count_press_jobs,0) +
            COALESCE(photography_jobs.count_photography_jobs,0)

            as total_jobs
        ')
        ->leftJoinSub($largeFormatJobs, 'large_format_jobs', function(JoinClause $joinClause){
            $joinClause->on('customers.customer_id', '=', 'large_format_jobs.customer_id');
        })
        ->leftJoinSub($embroideryJobs, 'embroidery_jobs', function(JoinClause $joinClause){
            $joinClause->on('customers.customer_id', '=', 'embroidery_jobs.customer_id');
        })
        ->leftJoinSub($designJobs, 'design_jobs', function(JoinClause $joinClause){
            $joinClause->on('customers.customer_id', '=', 'design_jobs.customer_id');
        })
        ->leftJoinSub($pressJobs, 'press_jobs', function(JoinClause $joinClause){
            $joinClause->on('customers.customer_id', '=', 'press_jobs.customer_id');
        })
        ->leftJoinSub($photographyJobs, 'photography_jobs', function(JoinClause $joinClause){
            $joinClause->on('customers.customer_id', '=', 'photography_jobs.customer_id');
        })
        ->where('customers.status', 'active')
        ->orderByRaw('total_jobs DESC')
        ->limit(10)
        ->get();




        // $customers = Customer::withCount('largeFormatJobs')
        // ->withCount('embroideryJobs')
        // ->withCount('designJobs')
        // ->withCount('pressJobs')
        // ->withCount('photography_jobs')
        // ->orderByRaw('large_format_jobs_count + embroidery_jobs_count + design_jobs_count + press_jobs_count + photography_jobs_count DESC')
        // ->limit(10)
        // ->get();

        // $customers->map(function ($customers) {
        //     $customers->total_jobs = $customers->large_format_jobs_count + $customers->embroidery_jobs_count + $customers->design_jobs_count + $customers->press_jobs_count + $customers->photography_jobs_count;
        // });

        return $customerRanking;
    }

    // END STATIC FUNCTIONS

}
