<?php

namespace App\Domain\PrintServices\Repositories;

use App\Domain\PrintServices\Contracts\PrintServiceRepositoryInterface;
use App\Domain\PrintServices\Models\PrintService;
use App\Domain\PrintServices\Models\PrintServiceCategory;
use App\Enums\Services\ServiceCategoryEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PrintServiceRepository implements PrintServiceRepositoryInterface
{
    public function __construct(
        protected PrintService $model,
    ) {}


    public function create(array $data): PrintService
    {
        return $this->model->create($data);
    }


    public function update(PrintService $printService, array $data): bool
    {
        return $printService->update($data);
    }


    public function delete(PrintService $printService): bool
    {
        return $printService->delete();
    }


    protected function baseQuery(): Builder
    {
        return $this->model
            ->newQuery()
            ->orderByDesc("service_name");
    }

    public function getAll(): Collection
    {
        return $this->baseQuery()->get();
    }


    public function findById(string $serviceId): ?PrintService
    {
        return $this->model->where('service_id', $serviceId)->first();
    }


    public function filterByCategory(ServiceCategoryEnum $category): Collection
    {
        return $this->queryByCategory($category)->get();
    }


    public function queryByCategory(ServiceCategoryEnum $category): Builder
    {
        return PrintService::inCategory($category);
    }



    public function allServiceCategories(): Collection
    {
        return PrintServiceCategory::get();
    }
}
