<?php


namespace App\Domain\PrintServices\Contracts;

use App\Domain\PrintServices\Models\PrintService;
use App\Enums\Services\ServiceCategoryEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


interface PrintServiceRepositoryInterface
{

    public function create(array $data): PrintService;
    public function update(PrintService $printService, array $data): bool;
    public function delete(PrintService $printService): bool;


    public function getAll(): Collection;
    public function findById(string $serviceId): ?PrintService;
    public function filterByCategory(ServiceCategoryEnum $category): Collection;
    public function queryByCategory(ServiceCategoryEnum $category): Builder;

    public function allServiceCategories(): Collection;

}
