<?php

declare(strict_types = 1);

namespace App\Domain\PrintJobs\Contracts;

use Illuminate\Database\Eloquent\Collection;
use JobStatisticsData;

interface JobStatisticsInterface
{
    public function serviceRanking(int $limit = 10): Collection;

    public function statistics (): JobStatisticsData;
}
