<?php

declare(strict_types=1);

namespace App\DTOs\Customers;

use App\Enums\Customers\CustomerCategoryEnum;
use App\Traits\ArrayableDTO;

final readonly class CustomerData
{

    use ArrayableDTO;

    public function __construct(
        public string $name,
        public string $phone,
        public CustomerCategoryEnum $category
    ){}
}
