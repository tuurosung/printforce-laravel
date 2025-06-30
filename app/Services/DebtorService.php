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
use PhpParser\Node\Expr\AssignOp\Coalesce;

class DebtorService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    private static array $jobModels = [
        LargeFormatJob::class => 'largeformat_jobs_total',
        EmbroideryJob::class => 'embroidery_jobs_total',
        DesignJob::class => 'design_jobs_total',
        PressJob::class => 'press_jobs_total',
        PhotographyJob::class => 'photography_jobs_total'
    ];


    public static function getDebtorsListOptimized()
    {
        $query = Customer::select(['customers.customer_id', 'customers.name'])
            ->where('customers.status', 'active');

        // Build the debit sum expression
        $debitSum = collect(static::$jobModels)->map(function ($alias, $modelClass) {
            $tableName = (new $modelClass)->getTable();
            return "COALESCE({$tableName}.{$alias}, 0)";
        })->implode(' + ');

        $query->selectRaw("({$debitSum}) as debit");

        // Add payments subquery
        $paymentsTable = (new CustomerPayment)->getTable();
        $query->selectRaw("COALESCE({$paymentsTable}.payments_amount_paid, 0) as credit");

        // Join all job tables using Eloquent models
        foreach (static::$jobModels as $modelClass => $alias) {
            $subquery = $modelClass::select(['customer_id', DB::raw("SUM(total) as {$alias}")])
                ->groupBy('customer_id');

            $tableName = (new $modelClass)->getTable();
            $query->leftJoinSub($subquery, $tableName, function ($join) use ($tableName) {
                $join->on('customers.customer_id', '=', "{$tableName}.customer_id");
            });
        }

        // Join payments using Eloquent model
        $paymentsSubquery = CustomerPayment::select(['customer_id', DB::raw('SUM(amount_paid) as payments_amount_paid')])
            ->groupBy('customer_id');

        $paymentsTable = (new CustomerPayment)->getTable();
        $query->leftJoinSub($paymentsSubquery, $paymentsTable, function ($join) use ($paymentsTable) {
            $join->on('customers.customer_id', '=', "{$paymentsTable}.customer_id");
        });

        return $query->havingRaw('debit > credit')->get();
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
