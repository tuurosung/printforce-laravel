<?php

namespace App\Enums\Services;

use App\Domain\PrintServices\Models\PrintService;
use App\Traits\System\EnumTrait;
use Illuminate\Support\Collection;

enum ServiceCategoryEnum: string
{
    use EnumTrait;


    case LARGE_FORMAT = '001';
    case DESIGN = '002';
    case EMBROIDERY = '003';
    case PRESS = '004';
    case PHOTOGRAPHY = '005';
    case OTHERS = '006';


    public function services(): Collection
    {
        return PrintService::inCategory($this)->get();
    }

    public function servicesArray(): array
    {
        return $this->services()->mapWithKeys(function ($service) {
            return [$service->service_id => $service->service_name];
    })
        ->toArray();
    }

}
