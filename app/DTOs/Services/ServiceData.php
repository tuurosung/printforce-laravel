<?php

declare(strict_types= 1);

namespace App\DTOs\Services;

use App\Enums\Services\ServiceCategoryEnum;
use App\Traits\ArrayableDTO;

final readonly class ServiceData
{
    use ArrayableDTO;


    public function __construct(
        public string $serviceId,
        public string $serviceName,
        public ServiceCategoryEnum $categoryId,
        public float $individual,
        public float $artist,
        public float $institution
    ){}
}
