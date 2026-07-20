<?php

declare(strict_types = 1);

namespace App\Domain\PrintJobs\Services;

use App\Domain\PrintJobs\Contracts\JobStatisticsInterface;
use App\Domain\PrintServices\Models\PrintService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use JobStatisticsData;

class JobStatisticsService implements JobStatisticsInterface
{
    public function serviceRanking(int $limit = 5): Collection
    {
        return PrintService::query()
            ->select(['services.service_id', 'services.service_name'])
            ->selectRaw('COUNT(jobs.service_id) as total')
            ->join('printforce_jobs as jobs', function (JoinClause $join){
                $join->on('jobs.service_id', '=', 'services.service_id')
                    ->whereNull('jobs.deleted_at');
            })
            ->where('services.status', 'active')
            ->groupBy(['services.service_id', 'services.service_name'])
            ->orderBy('total', 'desc')
            ->limit($limit)
            ->get();
    }


    public function statistics(): JobStatisticsData
    {
        throw new \Exception('Not implemented');
    }
}
