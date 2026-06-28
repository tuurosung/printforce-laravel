<?php

namespace App\Domain\PrintJobs\Services;

use App\Domain\PrintJobs\Contracts\LargeFormatJobServiceInterface;
use App\Domain\PrintJobs\Models\LargeFormatJob;
use App\Models\Customers\Customer;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

class LargeFormatJobService implements LargeFormatJobServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private LargeFormatJob $model,
    ){}


    public function create(Customer $customer, array $data): LargeFormatJob
    {
        $largeFormatJob = $customer->largeFormatJobs()->create($data);

        if (! $largeFormatJob) {
            throw new \Exception("Unable to create Large Format Job");
        }

        return $largeFormatJob;
    }


    public function update(LargeFormatJob $largeFormatJob, array $data): bool
    {
        $isUpdated = $largeFormatJob->update($data);

        if (! $isUpdated) {
            throw new \Exception("Unable to update Large Format Job");
        }

        return true;
    }


    public function delete(LargeFormatJob $largeFormatJob): bool
    {
        $isDeleted = $largeFormatJob->delete();

        if (! $isDeleted) {
            throw new \Exception("Unable to delete Large Format Job");
        }

        return true;
    }


    public function getLatestLargeFormatJobs()
    {
        return $this->baseQuery()->take(100)->get();
    }




    public function getLargeFormatJobsByDateRange(string $start_date, string $end_date)
    {
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();

        return $this->baseQuery->whereBetween('created_at', [$start_date, $end_date])->get();
    }



    public function getLargeFormatJobStatistics()
    {
        $statistics = $this->largeFormatJob->query()
            ->selectRaw('
                COUNT(CASE WHEN DATE(date) = CURDATE() THEN 1 ELSE NULL END) as todays_job_count,
                SUM(CASE WHEN DATE(date) = CURDATE() THEN total ELSE 0 END) as todays_jobs_total,

                COUNT(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN 1 ELSE NULL END) as this_months_job_count,
                SUM(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN total ELSE 0 END) as this_months_jobs_total,

                COUNT(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN 1 ELSE NULL END) as this_years_job_count,
                SUM(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN total ELSE 0 END) as this_years_jobs_total,

                COUNT(*) as all_time_job_count,
                SUM(total) as all_time_jobs_total

            ')->first();

        return [

            'todays_job_count' => $statistics->todays_job_count ?? 0,
            'todays_jobs_total' => $statistics->todays_jobs_total ?? 0,

            'this_months_job_count' => $statistics->this_months_job_count ?? 0,
            'this_months_jobs_total' => $statistics->this_months_jobs_total ?? 0,

            'this_years_job_count' => $statistics->this_years_job_count ?? 0,
            'this_years_jobs_total' => $statistics->this_years_jobs_total ?? 0,

            'all_time_job_count' => $statistics->all_time_job_count ?? 0,
            'all_time_jobs_total' => $statistics->all_time_jobs_total ?? 0,
        ];
    }


    public function performanceSummary()
    {
        // largeFormat jobs summary grouped by services
        $performanceSummary = LargeFormatJob::with('service')->selectRaw('service_id, SUM(total) as jobs_sum, COUNT(job_id) as jobs_count')
            ->whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->groupBy('service_id')
            ->orderBy('jobs_sum', 'desc')
            ->get();

        return $performanceSummary;
    }


    private function baseQuery(): Builder
    {
        return $this->model->with('customer', 'service')->latest('date');
    }


}
