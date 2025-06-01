<?php

namespace App\Services;

use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Customers\Customer;
use App\Models\Jobs\EmbroideryJob;
use Illuminate\Support\Facades\DB;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Models\Customers\CustomerPayment;
use Illuminate\Database\Query\JoinClause;

class DebtorService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public static function getDebtorsList()
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
            ->leftJoinSub($customerPayments, 'customer_payments', function (JoinClause $joinClause) {
                $joinClause->on('customers.customer_id', '=', 'customer_payments.customer_id');
            })
            ->where('customers.status', 'active')
            ->havingRaw('debit > credit')
            ->get();


        return $debtors;
    }
}
