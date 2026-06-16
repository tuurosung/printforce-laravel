<?php


namespace App\Domain\PrintServices\Contracts;

use App\Enums\Services\ServiceCategoryEnum;
use App\Models\Services\PrintService;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface PrintServiceRepositoryInterface extends BaseRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(string $serviceId): ?PrintService;
    public function filterByCategory(ServiceCategoryEnum $category): Collection;
    public function queryByCategory(ServiceCategoryEnum $category): Builder;

}
