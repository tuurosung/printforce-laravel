<?php

declare(strict_types= 1);

namespace App\Domain\PrintServices\Services;

use App\Domain\PrintServices\Models\PrintServiceCategory;
use App\Services\BaseService;

final class ServiceCategoryHandler extends BaseService
{

    protected string $selectOptionKey = "category_id";
    protected string $selectOption = "category_name";


    protected function modelClass(): string
    {
        return PrintServiceCategory::class;
    }
}
