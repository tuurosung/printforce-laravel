<?php

declare(strict_types= 1);

namespace App\Domain\Customers\Services;

use App\Domain\Customers\Contracts\CustomerStatisticsInterface;
use App\Domain\Customers\Models\Customer;
use App\DTOs\Customers\CustomerStatisticsData;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Cache;

final class CustomerStatistics implements CustomerStatisticsInterface
{

    public function getCustomerRanking(int $limit = 10): Collection
    {
        return Customer::query()
            ->select(['customers.customer_id', 'customers.name'])
            ->selectRaw('COUNT(jobs.job_id) as total_jobs')
            ->join('printforce_jobs as jobs', function (JoinClause $join) {
                $join->on('jobs.customer_id', '=', 'customers.customer_id')
                    ->whereNull('jobs.deleted_at');
            })
            ->where('customers.status', 'active')
            ->groupBy('customers.customer_id', 'customers.name')
            ->orderByDesc('total_jobs')
            ->limit($limit)
            ->get();
    }


    public function statistics(int $newWithinDays = 30): CustomerStatisticsData
    {
        $tenantId = Auth::user()->subscriber_id;
        $cacheKey ="customer_statistics_{$tenantId}";

        return Cache::store('file')->remember($cacheKey, now()->addMinutes(10), function() use ($newWithinDays):
            CustomerStatisticsData
            {
                $cutOff = now()->subDays($newWithinDays);

                $row = Customer::query()
                    ->selectRaw('
                    COUNT(*) as total_customers,
                    COUNT(CASE WHEN created_at >= ? THEN 1 END) as new_customers
                ', [$cutOff])
                    ->first();

                return new CustomerStatisticsData(
                    totalCustomers: $row->total_customers,
                    newCustomers: $row->new_customers,
                );
            }
        );

    }
}
