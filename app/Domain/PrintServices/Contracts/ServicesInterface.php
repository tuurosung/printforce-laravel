<?php

declare(strict_types= 1);

namespace App\Domain\PrintServices\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\PrintServices\Models\PrintService;
use App\DTOs\Services\ServiceData;
use App\Enums\Services\ServiceCategoryEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface ServicesInterface extends BaseInterface
{
    public function createNewService(ServiceData $serviceData): PrintService;
    public function updateService(PrintService $printService, ServiceData $serviceData): bool;
    public function deleteService(PrintService $printService): bool;


    public function filterByCategory(ServiceCategoryEnum $category): Collection;
    // public function queryByCategory(ServiceCategoryEnum $category): Builder;


}
