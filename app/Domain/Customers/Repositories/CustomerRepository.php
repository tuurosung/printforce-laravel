<?php

namespace App\Domain\Customers\Repositories;

use App\Data\CustomerData;
use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Models\Customers\Customer;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Models\Jobs\PressJob;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Override;

class CustomerRepository implements CustomerRepositoryInterface
{

    #[Override]
    public function getAllCustomers(): Collection
    {
        return Customer::all();
    }


    public function getCustomersArray(): array
    {
        return Customer::all()->toArray();
    }


    #[Override]
    public function getLatestCustomers(): Collection
    {
        return Customer::latest()->take(100)->get();
    }


    #[Override]
    public function filterCustomers(string $searchTerm): Collection
    {
        return Customer::whereLike('name', $searchTerm)
            ->orWhereLike('phone', $searchTerm)
            ->orWhereLike('category', $searchTerm)
            ->limit(10)
            ->get();
    }

    #[Override]
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

        return Customer::select('customers.customer_id')
            ->select('customers.name')
            ->selectRaw('(
                COALESCE(large_format_jobs.count_largeformat_jobs, 0) +
                COALESCE(embroidery_jobs.count_embroidery_jobs, 0) +
                COALESCE(design_jobs.count_design_jobs, 0) +
                COALESCE(press_jobs.count_press_jobs, 0) +
                COALESCE(photography_jobs.count_photography_jobs, 0)
            ) as total_jobs')
            ->leftJoinSub($largeFormatJobs, 'large_format_jobs', function ($join) {
                $join->on('customers.customer_id', '=', 'large_format_jobs.customer_id');
            })
            ->leftJoinSub($embroideryJobs, 'embroidery_jobs', function ($join) {
                $join->on('customers.customer_id', '=', 'embroidery_jobs.customer_id');
            })
            ->leftJoinSub($designJobs, 'design_jobs', function ($join) {
                $join->on('customers.customer_id', '=', 'design_jobs.customer_id');
            })
            ->leftJoinSub($pressJobs, 'press_jobs', function ($join) {
                $join->on('customers.customer_id', '=', 'press_jobs.customer_id');
            })
            ->leftJoinSub($photographyJobs, 'photography_jobs', function ($join) {
                $join->on('customers.customer_id', '=', 'photography_jobs.customer_id');
            })
            ->where('customers.status', 'active')
            ->orderByRaw('total_jobs DESC')
            ->limit(10)
            ->get();
    }

    #[Override]
    public static function getCustomerStatistics(): array
    {
        $carbonNow = Carbon::now();

        $statistics = Customer::query()
            ->selectRaw('COUNT(*) as total_customers, COUNT(CASE WHEN created_at >= ? THEN 1 END) as new_customers', [
                $carbonNow->subDays(30)->format('Y-m-d'),
            ])
            ->first();

        return [
            'total_customers' => $statistics->total_customers,
            'new_customers' => $statistics->new_customers,
        ];
    }


    /**
     * CRUD Left for concrete class to handle
     */
    public function createCustomer(CustomerData $data): Customer
    {
        return DB::transaction(function () use ($data) {
            return Customer::create($data->toArray());
        });
    }


    public function updateCustomer(Customer $customer, CustomerData $data): bool
    {
        return $customer->update($data->toArray());
    }


    public function deleteCustomer(Customer $customer): bool
    {
        return $customer->delete();
    }
}
