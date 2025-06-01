<?php

namespace App\Services;

use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Customers\Customer;
use App\Models\Jobs\EmbroideryJob;
use Illuminate\Support\Facades\DB;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use Illuminate\Database\Query\JoinClause;

class CustomerService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


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
}
