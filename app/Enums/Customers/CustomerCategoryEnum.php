<?php

namespace App\Enums\Customers;

use App\Traits\System\EnumTrait;

enum CustomerCategoryEnum: string
{

    use EnumTrait;


    case INDIVIDUAL = 'individual';
    case ARTIST = 'artist';
    case INSTITUTION = 'institution';


    public function priceColumn(): string
    {
        return $this->value;
    }
}
