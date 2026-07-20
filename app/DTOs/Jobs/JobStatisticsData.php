<?php

declare (strict_types = 1);

final readonly class JobStatisticsData
{
    public function __construct(
        public int $totalJobs,
        public int $monthlyTotal,
        public int $annualTotal
    ){}
}
