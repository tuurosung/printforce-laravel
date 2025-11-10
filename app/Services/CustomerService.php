<?php

namespace App\Services;

use Carbon\Carbon;
use App\Traits\Cacheable;
use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Customers\Customer;
use App\Models\Jobs\EmbroideryJob;
use Illuminate\Support\Facades\DB;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use Illuminate\Database\Query\JoinClause;
use App\Models\Customers\CustomerCategory;

class CustomerService
{
    use Cacheable;


    /**
     * Create a new class instance.
     */
    public function __construct(
        private $customer = new Customer()
    )
    {
        //
    }


    /**
     * Returns the Latest 100 customers as a collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestCustomers()
    {
        return $this->customer->query()
            ->with([
                'largeFormatJobs',
                'embroideryJobs',
                'pressJobs',
                'designJobs',
                'photography_jobs',
                'payments',
                'customerCategory'
            ])
            ->latest()
            ->limit(100)
            ->get();
    }


    /**
     * FIlter Customers by search term. and return a collection of customers.
     *
     * @param string $searchTerm
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function filterCustomers(string $searchTerm)
    {
        $customers = Customer::with([
            'largeFormatJobs',
            'embroideryJobs',
            'pressJobs',
            'designJobs',
            'photography_jobs',
            'payments'
        ])
        ->where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('phone', 'like', "%{$searchTerm}%");
        })
        ->limit(10)
        ->get();

        return $customers;
    }



    /**
     * Filter Customers by search term and return a json array of customer_id and name.
     *
     *
     * @param string $searchTerm
     */

    public static function filterCustomersJson(string $searchTerm)
    {
        $query = Customer::select(['customer_id', 'name'])
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%")
                      ->orWhere('phone', 'like', "%{$searchTerm}%");
            })
            ->limit(10)
            ->get();

        $customers = []; //initialize an empty array to hold the formatted results

        // Loop through the query results and format them
        foreach ($query as $customer) {
            $customers[] = [
                'id' => $customer->customer_id,
                'text' => $customer->name
            ];
        }

        return response()->json($customers); // Return the formatted results as a JSON response
    }



    /**
     * Returns all customers as a collection and caches the result for 60 minutes.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCustomers()
    {
        return $this->rememberCache(
            'all_customers',
            function () {
                return $this->customer->query()
                    ->latest()->get();
            }
        );
    }


    /**
     * Return all customers as an array of customer_id and name.
     */
    public function getCustomersArray()
    {
        return $this->getAllCustomers()
            ->mapWithKeys(function ($customer) {
                return [
                    $customer->customer_id => $customer->name
                ];
            })->toArray();
    }


    /**
     * Get the top 10 customers based on the number of jobs they have.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Customer>
     */
    public static function getCustomerRanking()
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
            ->leftJoinSub($largeFormatJobs, 'large_format_jobs', function (JoinClause $joinClause) {
                $joinClause->on('customers.customer_id', '=', 'large_format_jobs.customer_id');
            })
            ->leftJoinSub($embroideryJobs, 'embroidery_jobs', function (JoinClause $joinClause) {
                $joinClause->on('customers.customer_id', '=', 'embroidery_jobs.customer_id');
            })
            ->leftJoinSub($designJobs, 'design_jobs', function (JoinClause $joinClause) {
                $joinClause->on('customers.customer_id', '=', 'design_jobs.customer_id');
            })
            ->leftJoinSub($pressJobs, 'press_jobs', function (JoinClause $joinClause) {
                $joinClause->on('customers.customer_id', '=', 'press_jobs.customer_id');
            })
            ->leftJoinSub($photographyJobs, 'photography_jobs', function (JoinClause $joinClause) {
                $joinClause->on('customers.customer_id', '=', 'photography_jobs.customer_id');
            })
            ->where('customers.status', 'active')
            ->orderByRaw('total_jobs DESC')
            ->limit(10)
            ->get();

        return $customerRanking;
    }



    /**
     * Returns the customer statistics for the dashboard.
     *
     * @return array
     */
    public function getCustomerStatistics()
    {
        $carbonNow = Carbon::now();

        $statistics = $this->customer->query()
            ->selectRaw('
                COUNT(*) as total_customers,
                COUNT(CASE WHEN created_at >= ? AND created_at >= ? THEN 1 END) as new_customers
            ',[
                $carbonNow->subDays(30)->format('Y-m-d'), // New customers in the last 30 days
                $carbonNow->format('Y-m-d') // Current date
            ])
            ->first();

        return [
            'total_customers' => $statistics->total_customers,
            'new_customers' => $statistics->new_customers,
        ];
    }


    public function customerCategories()
    {
        return $this->rememberCache(
            'customer_categories',
            function () {
                return CustomerCategory::all();
            }
        );
    }
}
