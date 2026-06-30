<?php

namespace App\Enums\Services;

use App\Domain\PrintServices\Models\PrintService;
use App\Traits\Cacheable;
use App\Traits\System\EnumTrait;
use Illuminate\Support\Collection;

enum ServiceCategoryEnum: string
{
    use EnumTrait;
    use Cacheable;


    case LARGE_FORMAT = '001';
    case DESIGN = '002';
    case EMBROIDERY = '003';
    case PRESS = '004';
    case PHOTOGRAPHY = '005';
    case OTHERS = '006';


    public function services(): Collection
    {
        // return PrintService::inCategory($this)->get();
        return $this->rememberCache(
            $this->name,
            function () {
                return PrintService::inCategory($this)->get();
            }
        );
    }

    public function servicesArray(): array
    {
        return $this->services()->mapWithKeys(function ($service) {
            return [$service->service_id => $service->service_name];
    })
        ->toArray();
    }

    public function buildDetails(mixed $context): string
    {
        return match ($this) {
            self::LARGE_FORMAT => "{$context->width} x {$context->height} {$context->measuring_unit} ({$context->quantity} pcs)",
            self::EMBROIDERY   => "Materials {$context->material_unit_cost} x ({$context->quantity} pcs)",
            self::DESIGN,
            self::PRESS,
            self::OTHERS       => "{$context->quantity} pcs",
        };
    }

}
