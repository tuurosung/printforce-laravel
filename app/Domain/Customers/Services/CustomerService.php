<?php

namespace App\Domain\Customers\Services;

use App\Domain\Customers\Repositories\CustomerRepository;
use App\Models\Customers\Customer;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Models\Jobs\PressJob;
use App\Traits\Cacheable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class CustomerService
{
    use Cacheable;

    public function __construct(
        private CustomerRepository $customerRepository
    ){}


    public function getCustomerRanking(): Collection
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


    public static function getCustomerStatistics(): array
    {
        $carbonNow = Carbon::now();

        $statistics = Customer::query()
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


    public static function countNewCustomers()
    {
        $statistics = (new self)->getCustomerStatistics();
        return $statistics['new_customers'];
    }

}
